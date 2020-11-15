/*체크인 현재 날짜*/
document.getElementById('currnetDate').valueAsDate = new Date();
document.getElementById('currnetDate1').valueAsDate = new Date();

/*객실, 인원 수 카운트*/
$(function () {
  $('.countDown').click(function () {
    var n = $('.countDown').index(this);
    var num = $(".num:eq(" + n + ")").val();
    if (num <= 0) {
      return false;
    }
    num = $(".num:eq(" + n + ")").val(num * 1 - 1);
  });
  $('.countUp').click(function () {
    var n = $('.countUp').index(this);
    var num = $(".num:eq(" + n + ")").val();
    if (num > 4) {
      return false;
    }
    num = $(".num:eq(" + n + ")").val(num * 1 + 1);
  });
}) 