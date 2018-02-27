var express = require('express');
var router = express.Router();
var cheerio = require('cheerio');
var http = require('http')

/* GET home page. */
router.get('/', function(req, res, next) {
  res.render('index2');
});

router.post('/music', function(req, res, next) {
  //console.log(req.body.musicUrl)
  var url = req.body.musicUrl
  var html = '';
  http.get(url, function (result) {
    result.on('data', function (chunk) {
      html += chunk
    })
    result.on('end', function () {
      var $ = cheerio.load(html)
      var ids = []
      var idsHtml = $("[src='http://js.player.cntv.cn/creator/ncpa_audio.js']").next('script').html()
      //5107a433ae0a4745a8f7a4fddac6f492
      var ids = idsHtml.match(/[a-zA-Z0-9]{32}/g)
      res.json(ids)
    })
  })
});

module.exports = router;
