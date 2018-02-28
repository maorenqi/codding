// pages/otherBless/otherBless.js
const backgroundAudioManager = wx.getBackgroundAudioManager() //背景音乐管理

Page({

  /**
   * 页面的初始数据
   */
  data: {},

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.request({
      url: 'https://weixin.prykweb.com/app/index.php?i=2&t=117831&c=entry&a=wxapp&do=TraditionText&m=gj_zmhk',
      success: res => {
        console.log(res.data.data)
        this.setData({
          blessContent: res.data.data,
          cardBg: options.cardBg
        })
      }
    })

  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

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
  onShareAppMessage: function () {

  },

  selBless: function (e) {
    var blessId = e.currentTarget.dataset.blessid
    var blessContent = this.data.blessContent[blessId].content
    var that = this
    wx.redirectTo({
      url: '../traditionBless/traditionBless?otherBless=' + blessContent +
      '&cardBg=' + that.data.cardBg
    })
  }
})