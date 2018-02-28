var app = getApp()
const innerAudioContext = wx.createInnerAudioContext() //播放音频

wx.showShareMenu({
  withShareTicket: true
})

Page({

  /**
   * 页面的初始数据
   */
  data: {
    tempFilePath: '',
    shareText: '点击右上角···转发',
    duration: 0,
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.showShareMenu({
      withShareTicket: true
    })

    this.setData({
      cardTemplateBg: app.globalData.cardTemplateBg,
      audioBg: app.globalData.audioBg,
    })

    if (options.isShare == '0') {
      this.setData({
        shareText: '我要制作'
      })
    }


    //提交语音地址
    var that = this
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=GetCardInfo&m=gj_zmhk',
      data: {
        id: options.cardid
      },
      success: res => {
        console.log(res)
        this.setData({
          cardid: options.cardid,
          userInfo: res.data.data,
          tempFilePath: 'https://weixin.prykweb.com/attachment/' +
          res.data.data.content,
          duration: parseInt(options.duration / 1000),
          cardBg: 'https://weixin.prykweb.com/attachment/' +
          res.data.data.linkurl
        })
      }
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
  onShareAppMessage: function (res) {
    var that = this
    return {
      title: app.globalData.userInfo.nickName + '的新年贺卡-语音贺卡',
      path: '/pages/audioShare/audioShare?isShare=0&cardid=' +
      this.data.cardid,
      success: function (res) {
        console.log('cardid:' + that.data.cardid)
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
                  path: '/pages/audioShare/audioShare?cardid=' + that.data.cardid,
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
              path: '/pages/audioShare/audioShare?cardid=' + that.data.cardid,
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

  playVoice: function () {
    var that = this
    var src = this.data.tempFilePath

    innerAudioContext.autoplay = true
    innerAudioContext.src = src
    innerAudioContext.play() //需播放
    innerAudioContext.onPlay(() => {
      console.log('播放音频')
    })
    setTimeout(function () {
      innerAudioContext.stop() // 播放完停止，否则ios只能播放一次
      console.log('124: ' + that.data.duration)
    }, that.data.duration * 1000)

    innerAudioContext.onError((res) => {
      console.log('124:' + res.errMsg)
      console.log('125:' + res.errCode)
    })
  },

  restart: function () {
    wx.navigateBack({
      delta: 2
    })
  },

  shareFriend: function () {

  },

  goIndex: function () {
    if (this.data.shareText == '我要制作') {
      wx.redirectTo({
        url: '/pages/index/index',
        success: function () {

        }
      })
    }
  },

})