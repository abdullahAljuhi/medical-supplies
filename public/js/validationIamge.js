
             
                      $(document).on("change", ".custom-file-input", function() {
                        var img =document.getElementsByClassName('custom-file-input');
                        var myImg = this.files[0];
                        var myImgType = myImg["type"];
                        var validImgTypes = ["image/gif", "image/jpeg", "image/png"];
                  
                        if ($.inArray(myImgType, validImgTypes) < 0) {
                          alert("يرجى اختيار ملف من نوع صورة");
                          $('.custom-file-input').val('')
                        } else {
                          
                        }
                  
                      });
                
                