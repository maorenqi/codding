// pages/audioTemplate/audioTemplate.js
const backgroundAudioManager = wx.getBackgroundAudioManager() //背景音乐管理
const innerAudioContext = wx.createInnerAudioContext() //播放音频
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.showShareMenu({
      withShareTicket: true
    })

    this.setData({
      userInfo: app.globalData.userInfo,
      cardTemplateBg: app.globalData.cardTemplateBg,
      audioBg: app.globalData.audioBg,
    })
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=GetConfig&m=gj_zmhk',
      success: res => {
        this.setData({
          cardBg: 'https://weixin.prykweb.com/attachment/' + res.data.data.voiceimgurl,
          avatarUrl: 'https://weixin.prykweb.com/attachment/' + res.data.data.voiceavatar,
          duration: parseInt(res.data.data.voiceduration / 1000),
          src: 'https://weixin.prykweb.com/attachment/' +res.data.data.voicecontent,
        })
      }
    })


  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
    this.timer
    this.context = wx.createCanvasContext('voice')
    this.voiceList = '../../resource/images/voice.png'
    this.canvasWidth = 30
    this.canvasHeight = 30
    this.vx = 50 // 偏移距离
    this.position = 0
    this.context.drawImage(this.voiceList, 0, 0, 50, 50, 0, 0, 30, 30)
    this.context.draw()
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
      title: app.globalData.userInfo.nickName + '的新年贺卡-语音贺卡',
      path: '/pages/audioTemplate/audioTemplate',
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
                  path: '/pages/audioTemplate/audioTemplate',
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
              path: '/pages/audioTemplate/audioTemplate',
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

  createCard: function () {
    wx.navigateTo({
      url: '../audio/audio'
    })
  },

  //背景音乐
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
// 播放语音
  playVoice: function () {
    var that = this
    innerAudioContext.autoplay = true
    innerAudioContext.src = this.data.src
    innerAudioContext.play() //需播放
    innerAudioContext.onPlay(() => {
    })

    innerAudioContext.onEnded(() => {
      innerAudioContext.stop() // 播放完停止，否则ios只能播放一次
      clearInterval(this.timer)
      this.timer = null
    })

    if(this.timer){
      return false
    }else{
      this.timer = setInterval(function () {
        that.drawVoice()
      }, 500)
    }
  },

  drawVoice: function () {
    this.context.clearRect(0, 0, this.canvasWidth, this.canvasHeight)
    this.position += this.vx
    this.context.drawImage(this.voiceList, this.position, 0, 50, 50, 0, 0, 30, 30)
    this.context.draw()
    if(this.position > 150){
      this.position = 0
      this.context.drawImage(this.voiceList, this.position, 0, 50, 50, 0, 0, 30, 30)
      this.context.draw()
    }
  }
})