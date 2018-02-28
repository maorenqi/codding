// pages/videoShareCard/videoShareCard.js
var app = getApp()
const videoContext = wx.createVideoContext('video')
Page({

  /**
   * 页面的初始数据
   */
  data: {
    shareText: '点击右上角···转发'
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    this.setData({
      cardTemplateBg: app.globalData.cardTemplateBg
    })
    wx.showShareMenu({
      withShareTicket: true
    })

    if (options.isShare == '0') {
      this.setData({
        shareText: '我要制作'
      })
    }
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=GetCardInfo&m=gj_zmhk',
      data: {
        id: options.cardid
      },
      success: res => {
        var src = 'http://weixin.prykweb.com/attachment/' + res.data.data.content
        console.log('33: ' + src)
        this.setData({
          cardid: options.cardid,
          cardBg: 'https://weixin.prykweb.com/attachment/' +
          res.data.data.linkurl,
          videoSrc: src
        })
      }
    })

    videoContext.play()
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
    this.videoContext = wx.createVideoContext('video')
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
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function (res) {
    var that = this
    return {
      title: app.globalData.userInfo.nickName + '的新年贺卡-视频贺卡',
      path: '/pages/videoShareCard/videoShareCard?isShare=0&cardid=' +
      this.data.cardid,
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
                  path: '/pages/videoTemplate/videoTemplate?cardid=' + that.data.cardid,

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
              path: '/pages/videoTemplate/videoTemplate?cardid=' + that.data.cardid,
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
  playVideo: function () {
    console.log('play video')
    this.videoContext.play()
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

  videoErrorCallback: function (e) {
    console.log('视频错误信息:')
    console.log(e.detail.errMsg)

  }
})