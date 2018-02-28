//app.js
const backgroundAudioManager = wx.getBackgroundAudioManager()

App({
  onLaunch: function (opt) {
    console.log('onlaunch')
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=Bgmusic&m=gj_zmhk',
      success: res => {
        var index = Math.floor(Math.random() * 3)
        backgroundAudioManager.src = 'https://weixin.prykweb.com/attachment/' + res.data.data[index].linkurl
        backgroundAudioManager.title = res.data.data[index].musicname
        backgroundAudioManager.onEnded(res2 => {
          console.log('音乐结束')
          backgroundAudioManager.src = 'https://weixin.prykweb.com/attachment/' + res.data.data[index].linkurl
          backgroundAudioManager.title = res.data.data[index].musicname
        })
        backgroundAudioManager.onError((res) => {
        })
      }
    })


    // 展示本地存储能力
    var logs = wx.getStorageSync('logs') || []
    logs.unshift(Date.now())
    wx.setStorageSync('logs', logs)

    //获取微信头像

    // 登录
    wx.login({
      success: res => {
        console.log('登录')
        // 发送 res.code 到后台换取 openId, sessionKey, unionId
        this.globalData.js_code = res.code
        //存储在本地
        wx.setStorageSync('code', res.code)
        wx.request({
          url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=GetOpenid&m=gj_zmhk',
          data: {
            code: wx.getStorageSync('code')
          },
          success: res2 => {
            this.globalData.openid = res2.data.errno.openid
            wx.setStorageSync('openid', res2.data.errno.openid)
            wx.setStorageSync('session_key', res2.data.errno.session_key)
          }
        })
      }
    })


    // 获取用户信息
    wx.getSetting({
      success: res => {
        if (res.authSetting['scope.userInfo']) {
          //console.log(res.authSetting['scope.userInfo'])
          // 已经授权，可以直接调用 getUserInfo 获取头像昵称，不会弹框
          wx.getUserInfo({
            success: res => {
              // 可以将 res 发送给后台解码出 unionId
              this.globalData.userInfo = res.userInfo
              // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
              // 所以此处加入 callback 以防止这种情况
              if (this.userInfoReadyCallback) {
                this.userInfoReadyCallback(res)
              }

            }
          })
        } else {
          wx.getUserInfo({
            success: res => {
              // 可以将 res 发送给后台解码出 unionId
              this.globalData.userInfo = res.userInfo
              // 由于 getUserInfo 是网络请求，可能会在 Page.onLoad 之后才返回
              // 所以此处加入 callback 以防止这种情况
              if (this.userInfoReadyCallback) {
                this.userInfoReadyCallback(res)
              }
            },
            fail: res => {

              //this.globalData.loginConfirm = false
              wx.navigateBack({
                delta: 1
              })
            }
          })
        }
      }
    })

    /** 判断场景值，1044 为转发场景，包含shareTicket 参数 */
    if (opt.scene == 1044) {
      wx.getShareInfo({
        shareTicket: opt.shareTicket,
        success: function (res) {
          wx.request({
            url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=OpenShare&m=gj_zmhk',
            data: {
              sessionKey: wx.getStorageSync('session_key'),
              encryptedData: res.encryptedData,
              iv: res.iv,
              openid: wx.getStorageSync('openid'),
            },
            success: res2 => {
              console.log(res2)
            }
          })
        }
      })
    }
  },
  onHide: function () {
    console.log('onhide')
    this.globalData.goPlay = false
    backgroundAudioManager.pause()
  },
  onShow: function () {
    console.log('onshow')
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=Bgmusic&m=gj_zmhk',
      success: res => {
        var index = Math.floor(Math.random() * 3)
        backgroundAudioManager.src = 'https://weixin.prykweb.com/attachment/' + res.data.data[index].linkurl
        backgroundAudioManager.title = res.data.data[index].musicname
        backgroundAudioManager.onEnded(res2 => {
          console.log('音乐结束')
          backgroundAudioManager.src = 'https://weixin.prykweb.com/attachment/' + res.data.data[index].linkurl
          backgroundAudioManager.title = res.data.data[index].musicname
        })
        backgroundAudioManager.onError((res) => {
        })
      }
    })
    this.globalData.goPlay = true
    //backgroundAudioManager.play()
  },


  globalData: {
    userInfo: null,
    js_code: null,
    openid: null,
    goPlay: true,
    audioTextBg: null,
    audioBg: null,
    cardTemplateBg: null,
    loginConfirm: true
  }
})