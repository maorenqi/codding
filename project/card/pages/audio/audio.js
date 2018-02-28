const app = getApp()
const backgroundAudioManager = wx.getBackgroundAudioManager() //背景音乐管理

//封面图片
const cardUrls = []

Page({
  data: {
  },
  onLoad: function () {
    this.setData({
      userInfo: app.globalData.userInfo,
      cardTemplateBg: app.globalData.cardTemplateBg,
      audioBg: app.globalData.audioBg,
    })
    var that = this
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=bgimg&m=gj_zmhk',
      header: {
        'content-type': 'application/json' // 默认值
      },
      success: function (res) {
        //'https://weixin.prykweb.com/attachment/'
        var cardUrls = []
        var responese = res.data.data
        responese.forEach(function (item) {
          item = 'https://weixin.prykweb.com/attachment/' + item.linkurl
          cardUrls.push(item)
        })
        console.log(cardUrls)
        that.setData({
          audioData: {
            selectIndex: 0,
            cardUrls: cardUrls
          },
          cardBg: cardUrls[0]
        })
      }
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

  edit: function () {
    var that = this
    wx.navigateTo({
      url: '../audioCard/audioCard?cardUrls=' + that.data.audioData.cardUrls[that.data.audioData.selectIndex]
    })
  },
  cardSelect: function (e) {
    var index = e.currentTarget.dataset.idx
    var cardUrls = this.data.audioData.cardUrls
    this.setData({
      audioData: {
        selectIndex: index,
        cardUrls: cardUrls
      },
      cardBg: cardUrls[index]
    })
  },
  chooseImg: function () {
    wx.chooseImage({
      count: 1, // 默认9
      sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
      sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
      success: function (res) {
        // 返回选定照片的本地文件路径列表，tempFilePath可以作为img标签的src属性显示图片
        var tempFilePaths = res.tempFilePaths
        wx.uploadFile({
          url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=AddData&m=gj_zmhk',
          filePath: tempFilePaths[0],
          name: 'file',
          formData: {
            'type': 'image'
          },
          success: function (res) {
            var data = res.data
            var obj = JSON.parse(res.data)
           /* wx.navigateTo({
              url: '../traditionBless/traditionBless?cardUrls=https://weixin.prykweb.com/attachment/' + obj.data.path
            })*/
            wx.navigateTo({
              url: '../audioCard/audioCard?cardUrls=https://weixin.prykweb.com/attachment/' + obj.data.path
            })
          }
        })

      }
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