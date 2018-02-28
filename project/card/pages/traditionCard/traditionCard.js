const app = getApp()
const backgroundAudioManager = wx.getBackgroundAudioManager() //背景音乐管理
Page({
  data: {
    cardUrls: [],
    selectIndex: 0,
    fade: false,
    blessTitle: '',
    blessCont: '',
    isNext: false,
  },
  onLoad: function () {
    var that = this
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
        that.setData({
          cardUrlsList: {
            selectIndex: 0,
            cardUrls: cardUrls
          },
          cardBg: cardUrls[0] // 默认第一个背景图
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
    var cardUrls = this.data.cardUrls
    wx.navigateTo({
      url: '../traditionBless/traditionBless?cardUrls=' +
      that.data.cardUrlsList.cardUrls[that.data.cardUrlsList.selectIndex]
    })
  },
  cardSelect: function (e) {
    var index = e.currentTarget.dataset.idx
    var cardUrls = this.data.cardUrlsList.cardUrls
    this.setData({
      cardUrlsList: {
        selectIndex: index,
        cardUrls: cardUrls
      },
      cardBg: cardUrls[index]
    })
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
            console.log(obj.data.path)
            wx.navigateTo({
              url: '../traditionBless/traditionBless?cardUrls=https://weixin.prykweb.com/attachment/' + obj.data.path
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