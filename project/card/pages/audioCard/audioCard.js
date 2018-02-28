const recorderManager = wx.getRecorderManager() //录音管理器
const innerAudioContext = wx.createInnerAudioContext() //播放音频
const backgroundAudioManager = wx.getBackgroundAudioManager() //背景音乐管理
const app = getApp()

var util = require('../../utils/util.js')
var recordTimeInterval

Page({
  data: {
    recommendTextList: [],
    //recommendText: '',
    num: 0,
    recording: false, //录音中
    playing: false,//播放中
    hasRecord: false,//录音完
    recordTime: 0,//记录时间
    playTime: 0,//播放时间
    formatedRecordTime: '00:00:00',
    formatedPlayTime: '00:00:00',
    audioInfo: {},
    cardBg: '',
  },
  onLoad: function (options) {
    this.setData({
      audioTextBg: app.globalData.audioTextBg
    })
    //request
    wx.request({
        url:"https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=SpeechText&m=gj_zmhk",
        success:res=>{
          console.log(res.data.data)
          this.setData({
            recommendTextList: res.data.data,
            cardBg: options.cardUrls
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
  changeRcmd: function () {
    this.data.num++
    this.setData({
      num: this.data.num
    })
    if (this.data.num == this.data.recommendTextList.length - 1) {
      this.setData({
        num: 0
      })
    }
  },
  startRecord: function () {
    const options = {
      duration: 10000, //最长时间
      sampleRate: 44100,//采样率
      numberOfChannels: 1,//录音通道数
      encodeBitRate: 192000,//编码码率
      format: 'mp3',//音频格式
      frameSize: 50//指定帧大小
    }

    // 录音开始事件
    recorderManager.onStart(() => {

      recordTimeInterval = setInterval(() => {
        var recordTime = this.data.recordTime += 1
        this.setData({
          recording: true,
          formatedRecordTime: util.formatTime(this.data.recordTime),
          recordTime: recordTime,
          hasRecord: true
        })
      }, 1000)

    })
    console.log('recorder start')

    recorderManager.start(options)

  },
  stopRecord: function () {

    //录音结束事件
    recorderManager.onStop((res) => {
      clearInterval(recordTimeInterval)
      this.setData({
        recording: false,
        recordTime: 0,
        tempFilePath: res.tempFilePath,
        duration: res.duration
      })
    })

    recorderManager.stop()
  },
  playVoice: function () {
    //console.log('播放音频')
    //音频播放事件
    var that = this
    console.log(this.data.duration)
    innerAudioContext.autoplay = true
    innerAudioContext.src = this.data.tempFilePath
    innerAudioContext.play() //需播放 必须写这行
    console.log(this.data.tempFilePath)
    innerAudioContext.onPlay(() => {
      console.log('播放音频')
    })

    setTimeout(function () {
      innerAudioContext.stop() // 播放完停止，否则ios只能播放一次 必须写这行
      console.log('end')
    }, that.data.duration)

    //innerAudioContext.play()
  },
  restartRecord: function () {
    this.setData({
      recording: false,
      hasRecord: false,
      formatedRecordTime: util.formatTime(0),
    })
  },
  finishRecord: function () {
    wx.showLoading({
      title: '加载中',
      mask: true
    })
    var that = this
    if(app.globalData.userInfo){
      //上传语音
      wx.uploadFile({
        url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=AddData&m=gj_zmhk',
        filePath: that.data.tempFilePath,
        name: 'file',
        formData:{
          'type': 'voice'
        },
        success: function(res){
          var obj = JSON.parse(res.data)
          console.log('127:' +  that.data.cardBg)
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
              type: 1,
              name: '',
              content: obj.data.path,//语音地址 相对路径
              linkurl: that.data.cardBg.split('attachment/')[1],  //图片地址为绝对路径，需截取相对路径,
              duration: that.data.duration
            },
            success: res => {
              wx.hideLoading()
              wx.navigateTo({
                url: '../audioShare/audioShare?cardid=' + res.data.data + '&duration=' + that.data.duration
              })
            }
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