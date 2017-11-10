/**
 * Created by Administrator on 2017/11/7.
 */

$(function () {
  var articleItem = $('.article-item')
  articleItem.on('click', function () {
    $(this).addClass('hover').siblings().removeClass('hover')
  })

  var channelItem = $('.channel-item')
  var subChannelBox = channelItem.find('.sub-channel-box')

  channelItem.on('click', function () {
    $(this).find('.sub-channel-box').slideToggle()
    $(this).hasClass('show') ? $(this).removeClass('show') : $(this).
      addClass('show')
  })

  var navigationLeft = $('.navigation-left')
  var sideMenu = $('.side-menu')
  navigationLeft.on('click', function () {
    sideMenu.hasClass('side-hide')
      ? sideMenu.removeClass('side-hide').addClass('side-show') &&
      $('body').
        css('overflow', 'hidden').
        animate({'left': '5.22rem'}, 300, 'linear')
      : sideMenu.removeClass('side-show').addClass('side-hide') &&
      $('body').css('overflow', 'auto').animate({'left': '0'}, 300, 'linear')

    $(this).hasClass('rotate') ? $(this).removeClass('rotate') : $(this).
      addClass('rotate')
  })

  var doctorSlide = new Swiper('.doctor-slide', {
    paginationType: 'fraction',
    pagination: '.swiper-pagination'
  })
  var honorSlide = new Swiper('.honor-slide', {
    slidesPerView: 4,
    spaceBetween: 10
  })

  // 下拉菜单
  var currentMenu = $('.current-menu')
  var parentDownMenu = currentMenu.parent('.down-menu')
  currentMenu.on('click', function () {
    parentDownMenu.find('.toggle-menu').slideToggle()
    parentDownMenu.hasClass('active')
      ? parentDownMenu.removeClass('active')
      : parentDownMenu.addClass('active')
  })

  var headerHeight = $('header').outerHeight()
  var downMenu = $('.down-menu').outerHeight()
  var contentWrapper = $('.content-wrapper')
  if (currentMenu) {
    contentWrapper.css('marginTop', (downMenu + 30) + 'px')
  }
  $(window).on('scroll', function () {
    var scrollTop = document.documentElement.scrollTop ||
      document.body.scrollTop
    if (scrollTop > headerHeight) {
      parentDownMenu.addClass('fixed')
    } else {
      parentDownMenu.removeClass('fixed')
    }
  })
})

//表单验证
$('#fastOrder').formValidation({
  fields: {
    username: {
      validators: {
        notEmpty: {
          message: '姓名不能为空'
        }
      }
    },
    age: {
      validators: {
        notEmpty: {
          message: '年龄不能为空'
        }
      }
    },
    phone: {
      validators: {
        notEmpty: {
          message: '手机号不能为空'
        },
        regexp: {
          regexp: /^1[3|4|5|8][0-9]\d{8}$/,
          message: '手机号格式不正确'
        }
      }
    },
    'yyks[]': {
      validators: {
        notEmpty: {
          message: '预约科室不能为空'
        },
      }
    }

  }
}).on('success.form.fv', function(e){
  e.preventDefault();
  // Get the form instance
  var $form = $(e.target);
  var name=$(".username").val();
  var phone=$(".phone").val();
  var ks=$(".yyks").val();
  var url=window.location.pathname;
  $.ajax({
    url:"http://wap.prykweb.com/index.php?m=purui&c=ajaxdata&a=ajaxyygh&host=2",
    type:'POST',
    async:true,
    data:{
      name:name,
      phone:phone,
      ks:ks,
      url:url
    },
    dataType:'json',
    success:function(data){
      if(data==1){
        alert("预约成功");
        location.reload(true);
      }else if(data==2){
        alert("预约失败");
      }else if(data==3){
        alert("该号码预约过了,请24小时后在预约")
      }
    }
  });
});

