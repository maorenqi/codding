const app = getApp()
const backgroundAudioManager = wx.getBackgroundAudioManager() //背景音乐管理

Page({

  /**
   * 页面的初始数据
   */
  data: {
    editFlag: false
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    this.setData({
      cardBg: options.cardUrls,
      cardTemplateBg: app.globalData.cardTemplateBg
    })
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {
    if(app.globalData.goPlay){
      this.setData({
        isPlay: true
      })
    }else{
      this.setData({
        isPlay: false
      })
    }
  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  addVideo: function () {
    var that = this
    wx.chooseVideo({
      sourceType: ['album', 'camera'],
      maxDuration: 60, //拍摄时长
      camera: 'back', //后置摄像头
      success: function (res) {
        that.setData({
          videoSrc: res.tempFilePath,
          editFlag: true
        })
      }
    })
  },

  finishVideo: function () {
    var that = this
    if (app.globalData.userInfo) {
      wx.showLoading({
        title: '加载中',
        mask: true
      })
      //上传
      wx.uploadFile({
        url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=AddData&m=gj_zmhk',
        filePath: that.data.videoSrc,
        name: 'file',
        formData: {
          'type': 'video'
        },
        success: res => {
          var obj = JSON.parse(res.data)
          console.log(obj.data.path)
          wx.request({
            url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=AddCard&m=gj_zmhk',
            data: {
              openid: wx.getStorageSync('openid'),
              nickname: app.globalData.userInfo.nickName,
              avatar: app.globalData.userInfo.avatarUrl,
              sex: app.globalData.userInfo.gender,
              city: app.globalData.userInfo.city,
              province: app.globalData.userInfo.province,
              country: app.globalData.userInfo.country,
              type: 2,
              name: '',
              content: obj.data.path,//语音地址 相对路径
              linkurl: that.data.cardBg.split('attachment/')[1]  //图片地址为绝对路径，需截取相对路径
            },
            success: res => {
              console.log(res)
              wx.hideLoading()
              wx.navigateTo({
                url: '../videoShareCard/videoShareCard?cardid=' + res.data.data
              })
            }
          })

        }
      })
    }else{
      wx.showModal({
        content: '请先登录',
        success: function(res) {
          if (res.confirm) {
            console.log('用户点击确定')
            wx.redirectTo({
              url: '../index/index'
            })
          } else if (res.cancel) {
            console.log('用户点击取消')
          }
        }
      })
    }
  },
  restartVideo: function () {
    this.addVideo()
  },
  play: function () {
    if (app.globalData.goPlay) {
      backgroundAudioManager.pause()
      console.log('暂停')
      app.globalData.goPlay = false
      this.setData({
        isPlay: false
      })
    } else {
      backgroundAudioManager.play()
      console.log('播放')
      app.globalData.goPlay = true
      this.setData({
        isPlay: true
      })
    }
  },
})