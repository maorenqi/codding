const app = getApp()
const backgroundAudioManager = wx.getBackgroundAudioManager() //背景音乐管理

Page({
  data: {
  },
  onLoad: function (options) {
    if (options.cardUrls) {
      this.setData({
        cardBg: options.cardUrls
      })
    }

    if (options.otherBless) {
      console.log(options.otherBless)
      this.setData({
        blessCont: options.otherBless,
        blessTitle: app.globalData.userInfo.nickName,
      })
    }else{
      console.log('no otherbless')
      this.setData({
        blessTitle: app.globalData.userInfo.nickName,
        blessCont: '欢欢喜喜迎新年，万事如意平安年，扬眉吐气顺心年，梦想成真发财年，事业辉煌成功年，祝君岁岁有好年！祝您狗年大吉！'
      })
    }

    if (options.cardBg) {
      this.setData({
        cardBg: options.cardBg
      })
    }

    this.setData({
      cardTemplateBg: app.globalData.cardTemplateBg
    })

  },

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


  inputBlessTitle: function (e) {
    this.setData({
      blessTitle: e.detail.value
    })
  },
  inputBlessCont: function (e) {
    this.setData({
      blessCont: e.detail.value
    })
  },
  createCard: function () {
    var that = this
    if(app.globalData.userInfo){
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
          type: 0,
          name: that.data.blessTitle,
          content: that.data.blessCont,
          linkurl: that.data.cardBg.split('attachment/')[1] // 图片为绝对路径，需截取
        },
        success: res => {
          wx.navigateTo({
            url: '../traditionShareCard/traditionShareCard?cardid=' + res.data.data
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
  otherBless: function () {
    var that = this
    wx.navigateTo({
      url: '../otherBless/otherBless?cardBg=' + that.data.cardBg
    })
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