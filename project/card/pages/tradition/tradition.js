//获取应用实例
const app = getApp()
const backgroundAudioManager = wx.getBackgroundAudioManager() //背景音乐管理
Page({

  /**
   * 页面的初始数据
   */
  data: {
    autoplay: false,
    interval: 5000,
    duration: 1000,
    vertical: true,
    circular: true,
    isShow: false,
  },

  createCard: function () {
    wx.navigateTo({
      url: '../traditionCard/traditionCard'
    })
    /*this.setData({
     isShow: !this.isShow
     })*/
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    this.setData({
      cardTemplateBg: app.globalData.cardTemplateBg
    })
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=GetConfig&m=gj_zmhk',
      success: res => {
        console.log(res)
        this.setData({
          cardBg: 'https://weixin.prykweb.com/attachment/' + res.data.data.traditionimgurl,
          name: res.data.data.traditionname,
          traditioncontent: res.data.data.traditioncontent
        })
      }
    })
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

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function (res) {
    return {
      title: app.globalData.userInfo.nickName + '的新年贺卡-传统贺卡',
      path: '/pages/tradition/tradition',
      success: function (res) {
        var type = ''
        // 转发成功
        var shareTickets = res.shareTickets
        if (shareTickets) {
          type = '1'
        } else {
          type = '2'
        }
        if(shareTickets){
          wx.getShareInfo({
            shareTicket: shareTickets[0],
            success: function (res) {
              wx.request({
                url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=Share&m=gj_zmhk',
                data: {
                  sessionKey: wx.getStorageSync('session_key'),
                  encryptedData: res.encryptedData,
                  iv: res.iv,
                  type: type,
                  openid: wx.getStorageSync('openid'),
                  path: '/pages/tradition/tradition',
                },
                success: res2 => {
                  console.log(res2)
                }
              })
            }
          })
        }else{
          wx.request({
            url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=Share&m=gj_zmhk',
            data: {
              type: type,
              openid: wx.getStorageSync('openid'),
              path: '/pages/tradition/tradition',
            },
            success: res2 => {
              console.log(res2)
            }
          })
        }
      },
      fail: function (res) {

      }
    }
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