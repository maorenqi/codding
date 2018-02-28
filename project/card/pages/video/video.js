const app = getApp()
const backgroundAudioManager = wx.getBackgroundAudioManager() //背景音乐管理

//封面图片
const cardUrls = []

Page({
  data: {
    videoData: {
      selectIndex: 0,
      cardUrls: cardUrls,
    }
  },
  onLoad: function () {
    var that = this

    this.setData({
      cardTemplateBg: app.globalData.cardTemplateBg
    })

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
          videoData: {
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
    console.log(this.data.videoData)
    var that = this
    wx.navigateTo({
      url: '../videoCard/videoCard?cardUrls=' + that.data.videoData.cardUrls[that.data.videoData.selectIndex]
    })
  },
  cardSelect: function (e) {
    var index = e.currentTarget.dataset.idx
    console.log(index)
    var cardUrls = this.data.videoData.cardUrls
    this.setData({
      videoData: {
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
        wx.navigateTo({
          url: '../videoCard/videoCard?cardUrls=' + tempFilePaths
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