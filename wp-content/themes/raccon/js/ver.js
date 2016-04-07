(function($) {
  $(function() {
      $('body').on('click', '.btn-email', function (event){

            var $form = $(event.target).closest('form');
            $form.submit();
            return false;
            var form_data=$form.serializeObject();
            $('form').find(".onError").empty();
            $.ajax({
                url: $form.attr('action'),
                data: form_data,
                type: 'POST',
                beforeSend: function() {
                  if(form_data["your-name"]==""){
                    $('.nameError').html('请填写姓名');
                    $('.yourname').focus();
                    return false;
                  }else if(form_data["email"]==""||( form_data["email"]!="" && !/.+@.+\.[a-zA-Z]{2,4}$/.test(form_data["email"]))){
                    $('.emailError').html('请填写正确的邮箱地址');
                    $('youremail').focus();
                    return false;
                  }else if(form_data["comments"]==""){
                    $('.commentsError').html('请输入您的需求');
                    $('yourcomments').focus();
                    return false;
                  }else{
                    $('.onSuccess').html('邮件发送成功！');
                    $('.onSuccess').css("color","#007147");
                  }
                }
            }).done(function(data) {
              $('.yourcomments').val("");
            }).fail(function(err) {
            });
            return false;
      });
   });
})(jQuery);
