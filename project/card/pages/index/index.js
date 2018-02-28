//index.js
//获取应用实例
const app = getApp()
const backgroundAudioManager = wx.getBackgroundAudioManager() //背景音乐管理

Page({
  data: {
    motto: 'Hello World',
    userInfo: {},
    hasUserInfo: false,
    canIUse: wx.canIUse('button.open-type.getUserInfo'),
    isPlay: app.globalData.isPlay,
    loginConfirm: app.globalData.loginConfirm
  },
  //事件处理函数
  bindViewTap: function () {
    wx.navigateTo({
      url: '../userCenter/userCenter'
    })
  },
  onLoad: function () {
    wx.showShareMenu({
      withShareTicket: true
    })

    var that = this
    if (app.globalData.userInfo) {
      this.setData({
        userInfo: app.globalData.userInfo,
        hasUserInfo: true
      })
    } else if (this.data.canIUse) {
      // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
      // 所以此处加入 callback 以防止这种情况
      app.userInfoReadyCallback = res => {
        app.globalData.userInfo = res.userInfo
        this.setData({
          userInfo: res.userInfo,
          hasUserInfo: true
        })
        //此处才能获得userInfo数据,在这添加用户信息到后台
        wx.request({
          url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=AddUser&m=gj_zmhk',
          data: {
            nickname: that.data.userInfo.nickName,
            avatar: that.data.userInfo.avatarUrl,
            sex: that.data.userInfo.gender,
            city: that.data.userInfo.city,
            province: that.data.userInfo.province,
            country: that.data.userInfo.country,
            openid: wx.getStorageSync('openid')
          },
          success: res => {

          }
        })
      }
    }

    //请求背景图
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=GetConfig&m=gj_zmhk',
      success: res => {
        console.log(res)
        this.setData({
          cardBg: 'https://weixin.prykweb.com/attachment/' +
          res.data.data.homeimgurl
        })
        app.globalData.audioTextBg = 'https://weixin.prykweb.com/attachment/' + res.data.data.voicetextimgurl
        app.globalData.audioBg = 'https://weixin.prykweb.com/attachment/' + res.data.data.voicerecordimgurl
        app.globalData.cardTemplateBg = 'https://weixin.prykweb.com/attachment/' + res.data.data.commonimgurl
      }
    })

    //请求背景音乐
/*    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=Bgmusic&m=gj_zmhk',
      success: res => {
        var index = Math.floor(Math.random() * 3)
        backgroundAudioManager.src = 'https://weixin.prykweb.com/attachment/' + res.data.data[index].linkurl
        backgroundAudioManager.title = res.data.data[index].musicname
        backgroundAudioManager.onEnded(res2 => {
          console.log('音乐结束')
          backgroundAudioManager.src = 'https://weixin.prykweb.com/attachment/' + res.data.data[index].linkurl
          backgroundAudioManager.title = res.data.data[index].musicname
          /!*setTimeout(function () {
            backgroundAudioManager.src = 'https://weixin.prykweb.com/attachment/' + res.data.data[index].linkurl
          })*!/
        })
        backgroundAudioManager.onError((res) => {
        })
      }
    })*/
  },

  onReady: function () {
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

    //this.play()
  },

  getUserInfo: function (e) {
    var that = this
    app.globalData.userInfo = e.detail.userInfo
    if (app.globalData.userInfo) {
      console.log('点击登录')
      this.setData({
        userInfo: e.detail.userInfo,
        hasUserInfo: true
      })
      wx.request({
        url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=AddUser&m=gj_zmhk',
        data: {
          nickname: that.data.userInfo.nickName,
          avatar: that.data.userInfo.avatarUrl,
          sex: that.data.userInfo.gender,
          city: that.data.userInfo.city,
          province: that.data.userInfo.province,
          country: that.data.userInfo.country,
          openid: wx.getStorageSync('openid')
        },
        success: res => {
          console.log(res)
        }
      })
    }
  },
  navigatorTo: function (e) {
    //console.log(e.currentTarget.dataset.to);
    wx.navigateTo({
      url: '../' + e.currentTarget.dataset.to + '/' +
      e.currentTarget.dataset.to
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
  /*confirm: function () {

  },

  cancel: function () {
    wx.navigateBack({
      delta: 1
    })
  },*/

  onShareAppMessage: function (res) {
    return {
      title: app.globalData.userInfo.nickName + '的新年贺卡',
      path: '/pages/index/index',
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
                  path: '/pages/index/index',

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
              path: '/pages/index/index',
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
})
