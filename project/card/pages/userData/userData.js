// pages/userData/userData.js
const app = getApp()
Page({

  /**
   * 页面的初始数据
   */
  data: {},

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    var that = this
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=GetUserCard&m=gj_zmhk',
      data: {
        openid: app.globalData.openid
      },
      success: res => {
        console.log(res.data.data)
        switch (options.cardtype) {
          case '传统贺卡':
            that.setData({
              cardtype: options.cardtype,
              cardList: res.data.data[0] // 传统贺卡，
            })
            break
          case '语音贺卡':
            that.setData({
              cardtype: options.cardtype,
              cardList: res.data.data[1] // 语音贺卡，
            })
            break
          case '视频贺卡':
            that.setData({
              cardtype: options.cardtype,
              cardList: res.data.data[2] // 语音贺卡，
            })
            break
        }
      }
    })

    console.log(this.data.cardList)
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {
    this.animation = wx.createAnimation({

    })
    this.startX = 0
    this.delShow = false
    this.moveFlag = false
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


  goShareCard: function (e) {
    var that = this
    switch (e.currentTarget.dataset.cardtype) {
      //传统贺卡
      case '0':
        wx.navigateTo({
          url: '../traditionShareCard/traditionShareCard?shareText=已转发&cardid=' +
          e.currentTarget.dataset.cardid
        })
        break
      //语音贺卡
      case '1':
        wx.navigateTo({
          url: '../audioShare/audioShare?shareText=已转发&cardid=' +
          e.currentTarget.dataset.cardid + '&duration=' +
          e.currentTarget.dataset.duration
        })
        break
      case '2':
        wx.navigateTo({
          url: '../videoShareCard/videoShareCard?shareText=已转发&cardid=' +
          e.currentTarget.dataset.cardid
        })
        break
    }

  },

  startDel: function (e) {
    this.startX = e.touches[0].clientX
    this.setData({
      moveFlag: true,
      selectIndex: this.index
    })
  },
  showDelBtn: function (e) {
    var that = this
    var nowClientX = e.touches[0].clientX
    this.disX = nowClientX - this.startX
    this.index = e.currentTarget.dataset.idx
    this.setData({
      moveFlag: true,
      selectIndex: this.index
    })
    if (this.disX < 0 && !that.delShow) {

      //向左滑动
      this.animation.translateX(this.disX).step()
      this.setData({
        animationData: this.animation.export()
      })
      if (this.disX < -60) {
        this.animation.translateX(-60).step()
        this.setData({
          animationData: this.animation.export()
        })
        that.delShow = true
      }
    }
    //向右滑动
    if (this.disX > 0 && that.delShow) {
      console.log('right')
      this.animation.translateX(this.disX).step()
      this.setData({
        animationData: this.animation.export()
      })
      if (this.disX > 60) {
        this.animation.translateX(0).step()
        this.setData({
          animationData: this.animation.export()
        })
        that.delShow = false
      }
    }
  },
  endDel: function (e) {
    if (this.disX > -60) {
      console.log('no enough')
      this.animation.translateX(0).step()
      this.setData({
        animationData: this.animation.export()
      })
    }

  },
  delData: function (e) {
    var cardid = e.currentTarget.dataset.cardid
    var cardtype = e.currentTarget.dataset.cardtype
    switch (cardtype) {
      case '0':
        cardtype = '传统贺卡'
        break
      case '1':
        cardtype = '语音贺卡'
        break
      case '2':
        cardtype = '视频贺卡'
        break
    }
    var that = this
    wx.showLoading({
      title: '删除中',
      mask: true
    })
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=DelCard&m=gj_zmhk',
      data: {
        id: cardid
      },
      success: res2 => {
        wx.hideLoading()
        wx.redirectTo({
          url: '../userData/userData?cardtype=' + cardtype
        })

/*
        wx.request({
          url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=GetUserCard&m=gj_zmhk',
          data: {
            openid: app.globalData.openid
          },
          success: res => {
            console.log(res.data.data)
             switch (cardtype) {
             case '0':
             that.setData({
             //cardtype: cardtype,
             cardList: res.data.data[0] // 传统贺卡，
             })
             break
             case '1':
             that.setData({
             //cardtype: cardtype,
             cardList: res.data.data[1] // 语音贺卡，
             })
             break
             case '2':
             that.setData({
             //cardtype: cardtype,
             cardList: res.data.data[2] // 语音贺卡，
             })
             break
             }
          }
        })
*/

      }
    })
  }
})