

                      $(document).on("change", ".custom-file-input", function() {
                        var img =document.getElementsByClassName('custom-file-input');
                        var message =document.getElementsByClassName('message-error');
                        var myImg = this.files[0];
                        var myImgType = myImg["type"];
                        var validImgTypes = ["image/gif", "image/jpeg", "image/png"];
                        
                        if ($.inArray(myImgType, validImgTypes) < 0) {
                            $('.custom-file-input').val('');
                          $('.message-error').css("display","block");
                        } else {
                            $('.message-error').css("display","none");
                        }
                      });

