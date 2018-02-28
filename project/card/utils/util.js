// xxxx/xx/xx xx:xx:xx
/*const formatTime = date => {
 const year = date.getFullYear()
 const month = date.getMonth() + 1
 const day = date.getDate()
 const hour = date.getHours()
 const minute = date.getMinutes()
 const second = date.getSeconds()

 return [year, month, day].map(formatNumber).join('/') + ' ' + [hour, minute, second].map(formatNumber).join(':')
 }

 const formatNumber = n => {
 n = n.toString()
 return n[1] ? n : '0' + n
 }

 module.exports = {
 formatTime: formatTime
 }*/

//xx:xx:xx
function formatTime(time) {
  if (typeof time !== 'number' || time < 0) {
    return time
  }

  var hour = parseInt(time / 3600)
  time = time % 3600
  var minute = parseInt(time / 60)
  time = time % 60
  var second = time

  return ([hour, minute, second]).map(function (n) {
    n = n.toString()
    return n[1] ? n : '0' + n
  }).join(':')
}

module.exports = {
  formatTime: formatTime
}
