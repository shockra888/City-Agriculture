// Wait for the DOM to be ready
$(document).ready(function() {
$('#Fwork').fadeOut();
$('#Fmer').fadeOut();
$("#farmerlab").fadeOut();
$("#farmerlab1").fadeOut();
$("#farmworkerlab").fadeOut();
$("#farmworkerlab1").fadeOut();
    $("#RefNo").on('keyup',function () {
       if($(this).val().trim()!==""){
           if(/^[0-9_-]+$/.test($(this).val())){
                $(this).css("border-color","#5cb85c");
                $(".RefError").text("Valid");
                $(".RefError").css("color","#5cb85c");
           }else{
                $(this).css("border-color","#d9534f");
                $(".RefError").text("Input must be numbers and dash only");
                $(".RefError").css("color","#d9534f");
                $("#btn-confirm").prop("disabled", true);
           }
       }else{
            $(this).css("border-color","#d9534f");
            $(".RefError").text("This field is required");
            $(".RefError").css("color","#d9534f");
            $("#btn-confirm").prop("disabled", true);
       }
    });

    $("#Surname").on('keyup',function () {
        if($(this).val().trim()!==""){
            if(/^[a-zA-Z\s_ ]+$/.test($(this).val())){
                 $(this).css("border-color","#5cb85c");
                 $(".SurError").text("Valid");
                 $(".SurError").css("color","#5cb85c");
            }else{
                $(this).css("border-color","#d9534f");
                 $(".SurError").text("Input must be Letters or Whitespaces");
                 $(".SurError").css("color","#d9534f");
                 $("#btn-confirm").prop("disabled", true);
            }
        }else{
             $(this).css("border-color","#d9534f");
             $(".SurError").text("This field is required");
             $(".SurError").css("color","#d9534f");
             $("#btn-confirm").prop("disabled", true);
        }
     });

     $("#Firstname").on('keyup',function () {
        if($(this).val().trim()!==""){
            if(/^[a-zA-Z\s\.'_]+$/.test($(this).val())){
                 $(this).css("border-color","#5cb85c");
                 $(".FirstError").text("Valid");
                 $(".FirstError").css("color","#5cb85c");
            }else{
                $(this).css("border-color","#d9534f");
                 $(".FirstError").text("Input must be Letters or Whitespaces");
                 $(".FirstError").css("color","#d9534f");
                 $("#btn-confirm").prop("disabled", true);
            }
        }else{
             $(this).css("border-color","#d9534f");
             $(".FirstError").text("This field is required");
             $(".FirstError").css("color","#d9534f");
             $("#btn-confirm").prop("disabled", true);
        }
     });

     $("#Middlename").on('keyup',function () {
        if($(this).val().trim()!==""){
            if(/^[a-zA-Z\s_ ]+$/.test($(this).val())){
                 $(this).css("border-color","#5cb85c");
                 $(".MiddleError").text("Valid");
                 $(".MiddleError").css("color","#5cb85c");
            }else{
                $(this).css("border-color","#d9534f");
                 $(".MiddleError").text("Input must be Letters or Whitespaces");
                 $(".MiddleError").css("color","#d9534f");
                 $("#btn-confirm").prop("disabled", true);
            }
        }else{
             $(this).css("border-color","#d9534f");
             $(".MiddleError").text("This field is required");
             $(".MiddleError").css("color","#d9534f");
             $("#btn-confirm").prop("disabled", true);
        }
     });

     $("#HLB").on('keyup',function () {
        if($(this).val().trim()!==""){
            $(this).css("border-color","#5cb85c");
            $(".HLBError").text("Valid");
            $(".HLBError").css("color","#5cb85c");
        }else{
             $(this).css("border-color","#d9534f");
             $(".HLBError").text("This field is required");
             $(".HLBError").css("color","#d9534f");
             $("#btn-confirm").prop("disabled", true);
        }
     });

     $("#SSS").on('keyup',function () {
        if($(this).val().trim()!==""){
            $(this).css("border-color","#5cb85c");
            $(".SSSError").text("Valid");
            $(".SSSError").css("color","#5cb85c");
        }else{
             $(this).css("border-color","#d9534f");
             $(".SSSError").text("This field is required");
             $(".SSSError").css("color","#d9534f");
             $("#btn-confirm").prop("disabled", true);
        }
     });

     $("#Barangay").on('keyup',function () {
        if($(this).val().trim()!==""){
            if(/^[a-zA-Z\s_ ]+$/.test($(this).val())){
                 $(this).css("border-color","#5cb85c");
                 $(".BarangayError").text("Valid");
                 $(".BarangayError").css("color","#5cb85c");
            }else{
                $(this).css("border-color","#d9534f");
                 $(".BarangayError").text("Input must be Letters or Whitespaces");
                 $(".BarangayError").css("color","#d9534f");
                 $("#btn-confirm").prop("disabled", true);
            }
        }else{
             $(this).css("border-color","#d9534f");
             $(".BarangayError").text("This field is required");
             $(".BarangayError").css("color","#d9534f");
             $("#btn-confirm").prop("disabled", true);
        }
     });

     $("#MC").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".MCError").text("Valid");
                   $(".MCError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".MCError").text("Input must be Letters or Whitespaces");
                   $(".MCError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".MCError").text("This field is required");
               $(".MCError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#Province").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".ProvinceError").text("Valid");
                   $(".ProvinceError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".ProvinceError").text("Input must be Letters or Whitespaces");
                   $(".ProvinceError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".ProvinceError").text("This field is required");
               $(".ProvinceError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#Region").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z0-9\s- ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".RegionError").text("Valid");
                   $(".RegionError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".RegionError").text("Invalid Input");
                   $(".RegionError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".RegionError").text("This field is required");
               $(".RegionError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#Contactno").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^(\+)(\d){12}$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".ContactError").text("Valid");
                   $(".ContactError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".ContactError").text("Contact Number must be +639XXX format");
                   $(".ContactError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".ContactError").text("This field is required");
               $(".ContactError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#Birthplace").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".BirthplaceError").text("Valid");
                   $(".BirthplaceError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".BirthplaceError").text("Input must be Letters or Whitespaces");
                   $(".BirthplaceError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".BirthplaceError").text("This field is required");
               $(".BirthplaceError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#Religion").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".ReligionError").text("Valid");
                   $(".ReligionError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".ReligionError").text("Input must be Letters or Whitespaces");
                   $(".ReligionError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".ReligionError").text("This field is required");
               $(".ReligionError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#Maidenname").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".MaidennameError").text("Valid");
                   $(".MaidennameError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".MaidennameError").text("Input must be Letters or Whitespaces");
                   $(".MaidennameError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".MaidennameError").text("This field is required");
               $(".MaidennameError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

      

       $("#Housemem").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]*$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".HousememError").text("Valid");
                   $(".HousememError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".HousememError").text("Input must be a Number");
                   $(".HousememError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".HousememError").text("This field is required");
               $(".HousememError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#Maleno").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]*$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".MalenoError").text("Valid");
                   $(".MalenoError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".MalenoError").text("Input must be a Number");
                   $(".MalenoError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".MalenoError").text("This field is required");
               $(".MalenoError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#Femaleno").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]*$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".FemalenoError").text("Valid");
                   $(".FemalenoError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".FemalenoError").text("Input must be a Number");
                   $(".FemalenoError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".FemalenoError").text("This field is required");
               $(".FemalenoError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#Persontonotif").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".PersontonotifError").text("Valid");
                   $(".PersontonotifError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".PersontonotifError").text("Input must be Letters or Whitespaces");
                   $(".PersontonotifError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".PersontonotifError").text("This field is required");
               $(".PersontonotifError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#notcontact").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^(\+)(\d){12}$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".notcontactError").text("Valid");
                   $(".notcontactError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".notcontactError").text("Contact Number must be +639XXX format");
                   $(".notcontactError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".notcontactError").text("This field is required");
               $(".notcontactError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#IncomenonFarm").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]*$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".IncomenonFarmError").text("Valid");
                   $(".IncomenonFarmError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".IncomenonFarmError").text("Input must be a Number");
                   $(".IncomenonFarmError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".IncomenonFarmError").text("This field is required");
               $(".IncomenonFarmError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $("#IncomeFarm").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]*$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".IncomeFarmError").text("Valid");
                   $(".IncomeFarmError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".IncomeFarmError").text("Input must be a Number");
                   $(".IncomeFarmError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".IncomeFarmError").text("This field is required");
               $(".IncomeFarmError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
       });

       $(function(){
          $("input[name=Sex][value=Male]").on('click',function(){
               if($(this).prop('checked',true)){
                    $(".sex1").css("color","blue");
                    $(".sex2").css("color","#000000");
               }
          });
          $("input[name=Sex][value=Female]").on('click',function(){
               if($(this).prop('checked',true)){
                    $(".sex1").css("color","#000000");
                    $(".sex2").css("color","#FF00FF");
               }
          });
       });

       $(function(){
          $("input[name=stat][value=Married]").on('click',function(){
               $("#spousename").css("border-color","orange");
               $(".splab").css("color","red");
               $("#spousename").removeAttr("disabled");

               $("#spousename").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".spouseError").text("Valid");
                             $(".spouseError").css("color","#5cb85c");
                             $(".splab").css("color","black");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".spouseError").text("Input must be Letters or Whitespaces");
                             $(".spouseError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".spouseError").text("This field is required");
                         $(".spouseError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
                 });
          })
          $("input[name=stat][value=Single]").on('click',function(){
               $("#spousename").css("border-color","#ccc");
               $(".splab").css("color","black");
               $(".spouseError").text("");
               $("#spousename").prop("disabled", true);
          })
          $("input[name=stat][value=Widowed]").on('click',function(){
               $("#spousename").css("border-color","#ccc");
               $(".splab").css("color","black");
               $(".spouseError").text("");
               $("#spousename").prop("disabled", true);
          })
          $("input[name=stat][value=Separated]").on('click',function(){
               $("#spousename").css("border-color","#ccc");
               $(".splab").css("color","black");
               $(".spouseError").text("");
               $("#spousename").prop("disabled", true);
          })
       })

       $(function(){
          $("input[name=Householdhead][value=Yes]").on('click',function(){
               $(".hlab").css("color","black");
               $("#Hname").css("border-color","#ccc");
               $(".Relab").css("color","black");
               $("#Relationship").css("border-color","#ccc");
               $(".HnameError").text("");
               $(".RelationshipError").text("");
               $("#Hname").prop("disabled", true);
               $("#Relationship").prop("disabled", true);
          })

          $("input[name=Householdhead][value=No]").on('click',function(){
               $(".hlab").css("color","red");
               $("#Hname").css("border-color","orange");
               $(".Relab").css("color","red");
               $("#Relationship").css("border-color","orange");
               $("#Hname").removeAttr("disabled");
               $("#Relationship").removeAttr("disabled");

               $("#Hname").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".HnameError").text("Valid");
                             $(".HnameError").css("color","#5cb85c");
                             $(".Relab").css("color","black");
                             $(".hlab").css("color","black");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".HnameError").text("Input must be Letters or Whitespaces");
                             $(".HnameError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".HnameError").text("This field is required");
                         $(".HnameError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
               });

               $("#Relationship").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".RelationshipError").text("Valid");
                             $(".RelationshipError").css("color","#5cb85c");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".RelationshipError").text("Input must be Letters or Whitespaces");
                             $(".RelationshipError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".RelationshipError").text("This field is required");
                         $(".RelationshipError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
               });
          });

               $("#Housemem").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[0-9]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".HousememError").text("Valid");
                             $(".HousememError").css("color","#5cb85c");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".HousememError").text("Input must be numbers");
                             $(".HousememError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".HousememError").text("This field is required");
                         $(".HousememError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
               });
       })

       $(function(){
          $("input[name=Indigenous][value=Yes]").on('click',function(){
               $("#Indilab").css("color","red");
               $("#Indi").css("border-color","orange");
               $("#Indi").removeAttr("disabled");

               $("#Indi").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".IndiError").text("Valid");
                             $(".IndiError").css("color","#5cb85c");
                             $("#Indilab").css("color","red");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".IndiError").text("Input must be Letters or Whitespaces");
                             $(".IndiError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".IndiError").text("This field is required");
                         $(".IndiError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
               });
               
          })

          $("input[name=Indigenous][value=No]").on('click',function(){
               $("#Indilab").css("color","black");
               $("#Indi").css("border-color","#ccc");
               $("#Indi").prop("disabled", true);
               $(".IndiError").text("");
          })
       })

       $(function(){
          $("input[name=GovID][value=Yes]").on('click',function(){
               $("#govlab").css("color","red");
               $("#govid").css("border-color","orange");
               $("#govid").removeAttr("disabled");

               $("#govid").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".govidError").text("Valid");
                             $(".govidError").css("color","#5cb85c");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".govidError").text("Input must be Letters or Whitespaces");
                             $(".govidError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".govidError").text("This field is required");
                         $(".govidError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
               });
               
          })

          $("input[name=GovID][value=No]").on('click',function(){
               $("#govlab").css("color","black");
               $("#govid").css("border-color","#ccc");
               $("#govid").prop("disabled", true);
          })
     })

     $(function(){
          $("input[name=MemFAC][value=Yes]").on('click',function(){
               $("#Flab").css("color","red");
               $("#FAC").css("border-color","orange");
               $("#FAC").removeAttr("disabled");

               $("#FAC").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".FACError").text("Valid");
                             $(".FACError").css("color","#5cb85c");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".FACError").text("Input must be Letters or Whitespaces");
                             $(".FACError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".FACError").text("This field is required");
                         $(".FACError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
               });
               
          })

          $("input[name=MemFAC][value=No]").on('click',function(){
               $("#Flab").css("color","black");
               $("#FAC").css("border-color","#ccc");
               $("#FAC").prop("disabled", true);
          })
     })

     $(function(){
          $("input[name=livelihood][value=Farmer]").on('click',function(){
               $("#farmerlab").css("color","red");
               $("#farmworkerlab").css("color","black");
               $("#cropspec").css("border-color","#ccc");
               $('#Fwork').fadeOut();
               $('#Fmer').show(1000);
               $("#farmworkerlab").fadeOut();
               $("#farmworkerlab1").fadeOut();
               $("#farmerlab").show(1000);
               $("#farmerlab1").show(1000);


               $("input[name=FarmingACT][value=Rice]").on('click',function(){
                    $("#otherC").css("border-color","#ccc");
                    $(".otherCError").text("");
                    $("#otherC").prop("disabled", true);
               });

               $("input[name=FarmingACT][value=Corn]").on('click',function(){
                    $("#otherC").css("border-color","#ccc");
                    $(".otherCError").text("");
                    $("#otherC").prop("disabled", true);
               });

               $("input[name=FarmingACT][value=Othercrops]").on('click',function(){
                    $("#otherC").css("border-color","orange");
                    $("#otherC").removeAttr("disabled");

                    $("#otherC").on('keyup',function () {
                         if($(this).val().trim()!==""){
                             if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                                  $(this).css("border-color","#5cb85c");
                                  $(".otherCError").text("Valid");
                                  $(".otherCError").css("color","#5cb85c");
                             }else{
                                 $(this).css("border-color","#d9534f");
                                  $(".otherCError").text("Input must be Letters or Whitespaces");
                                  $(".otherCError").css("color","#d9534f");
                                  $("#btn-confirm").prop("disabled", true);
                             }
                         }else{
                              $(this).css("border-color","#d9534f");
                              $(".otherCError").text("This field is required");
                              $(".otherCError").css("color","#d9534f");
                              $("#btn-confirm").prop("disabled", true);
                         }
                    });
                    
               });
          });

          $("input[name=livelihood][value=Farmworker]").on('click',function(){
               $("#otherC").css("border-color","#ccc");
               $("#farmworkerlab").css("color","red");
               $("#farmerlab").css("color","black");
               $('#Fwork').show(1000);
               $('#Fmer').fadeOut();
               $("#farmerlab").fadeOut();
               $("#farmerlab1").fadeOut();
               $("#farmworkerlab").show(1000);
               $("#farmworkerlab1").show();

               $("input[name=kindOfwork][value=Land_Preparation]").on('click',function(){
                    $("#cropspec").css("border-color","#ccc");
                    $("#cropspec").prop("disabled", true);
                    $(".cropspecError").text("");
               });

               $("input[name=kindOfwork][value=Planting_Transplanting]").on('click',function(){
                    $("#cropspec").css("border-color","#ccc");
                    $("#cropspec").prop("disabled", true);
                    $(".cropspecError").text("");
               });

               $("input[name=kindOfwork][value=Cultivation]").on('click',function(){
                    $("#cropspec").css("border-color","#ccc");
                    $("#cropspec").prop("disabled", true);
                    $(".cropspecError").text("");
               });

               $("input[name=kindOfwork][value=Harvesting]").on('click',function(){
                    $("#cropspec").css("border-color","#ccc");
                    $("#cropspec").prop("disabled", true);
                    $(".cropspecError").text("");
               });

               $("input[name=kindOfwork][value=Others]").on('click',function(){
                   $("#cropspec").css("border-color","orange");
                   $("#cropspec").removeAttr("disabled");

                   $("#cropspec").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".cropspecError").text("Valid");
                             $(".otherCError").css("color","#5cb85c");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".cropspecError").text("Input must be Letters or Whitespaces");
                             $(".cropspecError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".cropspecError").text("This field is required");
                         $(".cropspecError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
               });
          });

     });
});

     $(function(){
          $("input[name=ownership][value=Registered_Owner]").on('click',function(){
               $("#Tenant").css("border-color","#ccc");
               $("#Lessee").css("border-color","#ccc");
               $("#otherowner").css("border-color","#ccc");
               $("#Tenant").prop("disabled", true);
               $("#Lessee").prop("disabled", true);
               $("#otherowner").prop("disabled", true);
               $(".TenantError").text("");
               $(".LesseeError").text("");
               $(".OtherError").text("");
          });

          $("input[name=ownership][value=Tenant]").on('click',function(){
               $("#Tenant").css("border-color","orange");
               $("#Lessee").css("border-color","#ccc");
               $("#otherowner").css("border-color","#ccc");
               $("#Tenant").removeAttr("disabled");
               $("#Lessee").prop("disabled", true);
               $(".LesseeError").text("");
               $(".OtherError").text("");

               $("#Tenant").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".TenantError").text("Valid");
                             $(".TenantError").css("color","#5cb85c");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".TenantError").text("Input must be Letters or Whitespaces");
                             $(".TenantError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".TenantError").text("This field is required");
                         $(".TenantError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
               });
          });

          $("input[name=ownership][value=Lessee]").on('click',function(){
               $("#Lessee").css("border-color","orange");
               $("#Tenant").css("border-color","#ccc");
               $("#otherowner").css("border-color","#ccc");
               $("#Lessee").removeAttr("disabled");
               $("#Tenant").prop("disabled", true);
               $(".TenantError").text("");
               $(".OtherError").text("");

               $("#Lessee").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".LesseeError").text("Valid");
                             $(".LesseeError").css("color","#5cb85c");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".LesseeError").text("Input must be Letters or Whitespaces");
                             $(".LesseeError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".LesseeError").text("This field is required");
                         $(".LesseeError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
               });
          });

          $("input[name=ownership][value=OtherOwner]").on('click',function(){
               $("#Lessee").css("border-color","#ccc");
               $("#Tenant").css("border-color","#ccc");
               $("#otherowner").css("border-color","orange");
               $("#otherowner").removeAttr("disabled");
               $("#Tenant").prop("disabled", true);
               $("#Lessee").prop("disabled", true);
               $("#Lessee").removeAttr("disabled");
               $("#Tenant").prop("disabled", true);

               $("#otherowner").on('keyup',function () {
                    if($(this).val().trim()!==""){
                        if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                             $(this).css("border-color","#5cb85c");
                             $(".OtherError").text("Valid");
                             $(".OtherError").css("color","#5cb85c");
                        }else{
                            $(this).css("border-color","#d9534f");
                             $(".OtherError").text("Input must be Letters or Whitespaces");
                             $(".OtherError").css("color","#d9534f");
                             $("#btn-confirm").prop("disabled", true);
                        }
                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".OtherError").text("This field is required");
                         $(".OtherError").css("color","#d9534f");
                         $("#btn-confirm").prop("disabled", true);
                    }
               });
          });
     });

     $("#landloc").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".landlocError").text("Valid");
                   $(".landlocError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".landlocError").text("Input must be Letters or Whitespaces");
                   $(".landlocError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".landlocError").text("This field is required");
               $(".landlocError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
     });

     $("#docno").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".docnoError").text("Valid");
                   $(".docnoError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".docnoError").text("Input must be numbers");
                   $(".docnoError").css("color","#d9534f");
                   $("#btn-confirm").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".docnoError").text("This field is required");
               $(".docnoError").css("color","#d9534f");
               $("#btn-confirm").prop("disabled", true);
          }
     });

     $(function(){
          $("#RefNo").blur(function(){
               if($(this).val.length===0){
                    $("#btn-confirm").prop("disabled", true);
               }else{
                    $("#btn-confirm").removeAttr("disabled");
               }
          })

          $("input[name=ownership]").on('click',function(){
               $("#btn-confirm").removeAttr("disabled");
          })
     });


     /---------------------------------------------------------------------------------/

     $("#oth").hide();
     $("#btn-add").prop("disabled", true);
     $("#cropcom").on('keyup',function () {
          if($(this).val().trim()!==""){
               $("#oth").hide(1000);
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".cropcomError").text("Valid");
                   $(".cropcomError").css("color","#5cb85c");

                   if($(this).val() == "Others" || $(this).val() == "others"){
                         $("#oth").show(1000);
                    }else{
                         $("#oth").hide(1000);
                    }
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".cropcomError").text("Input must be Letters or Whitespaces");
                   $(".cropcomError").css("color","#d9534f");
                   $("#btn-add").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".cropcomError").text("This field is required");
               $(".cropcomError").css("color","#d9534f");
               $("#btn-add").prop("disabled", true);
          }
     });

     $("#othercropcom").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".othercropcomError").text("Valid");
                   $(".othercropcomError").css("color","#5cb85c");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".othercropcomError").text("Input must be Letters or Whitespaces");
                   $(".othercropcomError").css("color","#d9534f");
                   $("#btn-add").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".othercropcomError").text("This field is required");
               $(".othercropcomError").css("color","#d9534f");
               $("#btn-add").prop("disabled", true);
          }
     });

     $("#Size").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".SizeError").text("Valid");
                   $(".SizeError").css("color","#5cb85c");
              }else{
                  $(this).css("border-color","#d9534f");
                   $(".SizeError").text("Input must be numbers");
                   $(".SizeError").css("color","#d9534f");
                   $("#btn-add").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".SizeError").text("This field is required");
               $(".SizeError").css("color","#d9534f");
               $("#btn-add").prop("disabled", true);
          }
     });
       
     $("#Farmtype").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".FarmtypeError").text("Valid");
                   $(".FarmtypeError").css("color","#5cb85c");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".FarmtypeError").text("Input must be Letters or Whitespaces");
                   $(".FarmtypeError").css("color","#d9534f");
                   $("#btn-add").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".FarmtypeError").text("This field is required");
               $(".FarmtypeError").css("color","#d9534f");
               $("#btn-add").prop("disabled", true);
          }
     });

     $("#orgpra").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".orgpracError").text("Valid");
                   $(".orgpracError").css("color","#5cb85c");
                   $("#btn-add").removeAttr("disabled");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".orgpracError").text("Input must be Letters or Whitespaces");
                   $(".orgpracError").css("color","#d9534f");
                   $("#btn-add").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".orgpracError").text("This field is required");
               $(".orgpracError").css("color","#d9534f");
               $("#btn-add").prop("disabled", true);
          }
     });

     /---------------------------------------------------------------------------------/

     $(function(){
          if($("#lhood").val()=="Farmer"){
               $("#flab").hide();
               $("#flab1").hide();
               $("#flab2").hide();
          }else if($("#lhood").val()=="Farmworker"){
               $("#farlab").hide();
               $("#farlab1").hide();
               $("#farlab2").hide();
          }

          $("#lhood").on('keyup',function(){
               if($(this).val().trim()!==""){
                    $("#farlab").hide();
                    $("#farlab1").hide();
                    $("#farlab2").hide();
                    $("#flab").hide();
                    $("#flab1").hide();
                    $("#flab2").hide();

                    if($(this).val() == "Farmer" || $(this).val() == "farmer"){
                         $("#farlab").show(1000);
                         $("#farlab1").show(1000);
                         $("#farlab2").show(1000);
                         $("#flab").hide(1000);
                         $("#flab1").hide(1000);
                         $("#flab2").hide(1000);
                         $("#lhood").css("border-color","#5cb85c");
                         $(".lhood1").text("");
                    }else if($(this).val() == "Farmworker" || $(this).val() == "farmworker"){
                         $("#flab").show(1000);
                         $("#flab1").show(1000);
                         $("#flab2").show(1000);
                         $("#farlab").hide(1000);
                         $("#farlab1").hide(1000);
                         $("#farlab2").hide(1000);
                         $("#lhood").css("border-color","#5cb85c");
                         $(".lhood1").text("");
                    }else{
                         $(".lhood1").text("Input must be Farmer or Farmworkers");
                         $(".lhood1").css("color","#d9534f");
                    }
               }else{
                    
               }
          });
     });

     /---------------------------------------------------------------------------------/

     $(function(){
          if($("#own").val()=="Registered_Owner"){
               $("#ten").hide();
               $("#les").hide();
               $("#ownth").hide();
          }else if($("#own").val()=="Tenant"){
               $("#les").hide();
               $("#ownth").hide();
          }else if($("#own").val()=="Lessee"){
               $("#ten").hide();
               $("#ownth").hide();
          }else if($("#own").val()=="OtherOwner"){
               $("#ten").hide();
               $("#les").hide();
          }

          $("#own").on('keyup',function(){
               if($(this).val().trim()!==""){
                    $("#ten").hide();
                    $("#les").hide();
                    $("#ownth").hide();
                    if($(this).val() == "Registered_Owner" || $(this).val() == "registered_owner"){
                         $("#ten").hide(1000);
                         $("#les").hide(1000);
                         $("#ownth").hide(1000);
                         $(".ownth1").text("");
                    }else if($(this).val() == "Tenant" || $(this).val() == "tenant"){
                         $("#ten").show(1000);
                         $("#les").hide(100);
                         $("#ownth").hide(100);
                         $(".ownth1").text("");
                    }else if($(this).val() == "Lessee" || $(this).val() == "lessee"){
                         $("#les").show(1000);
                         $("#ten").hide(100);
                         $("#ownth").hide(100);
                         $(".ownth1").text("");
                    }else if($(this).val() == "OtherOwner" || $(this).val() == "otherowner"){
                         $("#ownth").show(1000);
                         $("#ten").hide(100);
                         $("#les").hide(100);
                         $(".ownth1").text("");
                    }else{
                         $(".ownth1").text("Input must be Registered_Owner, Tenant, Lessee, or OtherOwner");
                         $(".ownth1").css("color","#d9534f");
                    }
               }
          });
     });

     /---------------------------------------------------------------------------------/

     $("#plantname").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".plantnameError").text("Valid");
                   $(".plantnameError").css("color","#5cb85c");
                   $("#btn-seed").removeAttr("disabled");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".plantnameError").text("Input must be Letters or Whitespaces");
                   $(".plantnameError").css("color","#d9534f");
                   $("#btn-seed").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".plantnameError").text("This field is required");
               $(".plantnameError").css("color","#d9534f");
               $("#btn-seed").prop("disabled", true);
          }
     });

     $("#available").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".availableError").text("Valid");
                   $(".availableError").css("color","#5cb85c");
                   $("#btn-seed").removeAttr("disabled");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".availableError").text("Input must be Numbers");
                   $(".availableError").css("color","#d9534f");
                   $("#btn-seed").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".availableError").text("This field is required");
               $(".availableError").css("color","#d9534f");
               $("#btn-seed").prop("disabled", true);
          }
     });


     /---------------------------------------------------------------------------------/

     $("#btn-fert").prop("disabled", true);
     $("#fertilizername").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".fertilnameError").text("Valid");
                   $(".fertilnameError").css("color","#5cb85c");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".fertilnameError").text("Input must be Letters or Whitespaces");
                   $(".fertilnameError").css("color","#d9534f");
                   $("#btn-fert").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".fertilnameError").text("This field is required");
               $(".fertilnameError").css("color","#d9534f");
               $("#btn-fert").prop("disabled", true);
          }
     });

       $("#weight").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".weightError").text("Valid");
                   $(".weightError").css("color","#5cb85c");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".weightError").text("Input must be Numbers");
                   $(".weightError").css("color","#d9534f");
                   $("#btn-fert").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".weightError").text("This field is required");
               $(".weightError").css("color","#d9534f");
               $("#btn-fert").prop("disabled", true);
          }
     });


     $("#favailable").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".favailableError").text("Valid");
                   $(".favailableError").css("color","#5cb85c");
                   $("#btn-fert").removeAttr("disabled");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".favailableError").text("Input must be Numbers");
                   $(".favailableError").css("color","#d9534f");
                   $("#btn-fert").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".favailableError").text("This field is required");
               $(".favailableError").css("color","#d9534f");
               $("#btn-fert").prop("disabled", true);
          }
     });

     /---------------------------------------------------------------------------------/

     $(".vehicle").hide();
     $(".tractor").hide();
     $(".combine").hide();
     $(".attach").hide();
     $("#btn-util").prop("disabled", true);
     $("#category").on('click',function(){
          if($(this).val() == "Farming_vehicle"){
               $(".vehicle").show(1000);
               $(".attach").hide(1000);
               $("#veh").show(1000);
          }else if($(this).val() == "Vehicle_attachment"){
               $(".attach").show(1000);
               $(".vehicle").hide(1000);
               $(".combine").hide(1000);
               $(".tractor").hide(1000);
               $("#veh").hide(1000);
          }
     });

     $("#veh").on('click',function(){
          if($(this).val() == "Tractor"){
               $(".tractor").show(1000);
               $(".combine").hide(1000);
          }else if($(this).val() == "Combine_or_Harvester"){
               $(".combine").show(1000);
               $(".tractor").hide(1000);
          }
     });

     $("#utilname").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".utilError").text("Valid");
                   $(".utilError").css("color","#5cb85c");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".utilError").text("Input must be Letters or Whitespaces");
                   $(".utilError").css("color","#d9534f");
                   $("#btn-util").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".utilError").text("This field is required");
               $(".utilError").css("color","#d9534f");
               $("#btn-util").prop("disabled", true);
          }
     });

     $("#avail").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[0-9]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".availError").text("Valid");
                   $(".availError").css("color","#5cb85c");
                   $("#btn-util").removeAttr("disabled");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".availError").text("Input must be Number");
                   $(".availError").css("color","#d9534f");
                   $("#btn-util").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".availError").text("This field is required");
               $(".availError").css("color","#d9534f");
               $("#btn-util").prop("disabled", true);
          }
     });

     /---------------------------------------------------------------------------------/
     $("#btn-dist").prop("disabled", true);
     $("#searchFarmer").on('keyup',function () {
          if($(this).val().trim()!==""){
              if(/^[a-zA-Z\s_/ ]+$/.test($(this).val())){
                   $(this).css("border-color","#5cb85c");
                   $(".Error").text("Valid");
                   $(".Error").css("color","#5cb85c");

              }else{
                  $(this).css("border-color","#d9534f");
                   $(".Error").text("Input must be Letters or Whitespaces");
                   $(".Error").css("color","#d9534f");
                   $("#btn-dist").prop("disabled", true);
              }
          }else{
               $(this).css("border-color","#d9534f");
               $(".Error").text("This field is required");
               $(".Error").css("color","#d9534f");
               $("#btn-dist").prop("disabled", true);
          }
     });

     /---------------------------------------------------------------------------------/

     $(function(){
          if($("#catt").text() === "Farming_vehicle"){
               $("#atttype").hide();
               $("ttype").show();

               if($("#ttype").text() === "Tractor"){
                    $("#typetract").show();
                    $("#chtype").hide();
               }else if($("#ttype").text() === "Combine_or_Harvester"){
                    $("#chtype").show();
                    $("#typetract").hide();
               }
          }else if($("#ttype").text() === "Vehicle_attachment"){
               $("#atttype").show();
               $("ttype").hide();
          }
     });

     /----------------------------------------------/

     $(function(){
          $("#lati").on('keyup',function(){
               if(/^[-?\d+(\.\d+)?]+$/.test($(this).val())){
                    $(this).css("border-color","#5cb85c");
                    $(".latError").text("Valid");
                    $(".latError").css("color","#5cb85c");
 
               }else{
                   $(this).css("border-color","#d9534f");
                    $(".latError").text("Input must be Map Coordinate format");
                    $(".latError").css("color","#d9534f");
               }
          });

          $("#longi").on('keyup',function(){
               if(/^[-?\d+(\.\d+)?]+$/.test($(this).val())){
                    $(this).css("border-color","#5cb85c");
                    $(".longError").text("Valid");
                    $(".longError").css("color","#5cb85c");
 
               }else{
                   $(this).css("border-color","#d9534f");
                    $(".longError").text("Input must be Map Coordinate format");
                    $(".longError").css("color","#d9534f");
               }
          });
     });

     /----------------------------------------------/

     $(function(){
          $("#pass").attr('disabled', 'disabled');
          $("#repass").attr('disabled', 'disabled');
          $("#btn-res").attr('disabled', 'disabled');

          $("#tokeninput").on('keyup',function(){
               if($(this).val().trim()!==""){
                    if($(this).val() == 000000 && $(this).val().length == 6){
                         $(this).css("border-color","#5cb85c");
                         $(".tokenError").text(" Token Accepted");
                         $(".tokenError").css("color","#5cb85c");
                         $("#pass").removeAttr('disabled');
                         $("#repass").removeAttr('disabled');

                         $("#repass").on('keyup',function(){
                              if($(this).val().trim()!==""){
                                   if($(this).val() == $("#pass").val()){
                                        $(this).css("border-color","#5cb85c");
                                        $("#pass").css("border-color","#5cb85c");
                                        $(".repassError").text(" Input Accepted");
                                        $(".repassError").css("color","#5cb85c");
                                        $("#btn-res").removeAttr('disabled');
                                   }else{
                                        $(this).css("border-color","#d9534f");
                                        $("#pass").css("border-color","#d9534f");
                                        $(".repassError").text("Passwords Doesn't match");
                                        $(".repassError").css("color","#d9534f");
                                        $("#btn-res").attr('disabled', 'disabled');
                                   }
                              }else{
                                   $(this).css("border-color","#d9534f");
                                   $(".repassError").text("This Field is required");
                                   $(".repassError").css("color","#d9534f");
                                   $("#btn-res").attr('disabled', 'disabled');
                              }
                         });

                    }else{
                         $(this).css("border-color","#d9534f");
                         $(".tokenError").text("Wrong Token");
                         $(".tokenError").css("color","#d9534f");
                         $("#pass").attr('disabled', 'disabled');
                         $("#repass").attr('disabled', 'disabled');
                    }
               }else{
                    $(this).css("border-color","#d9534f");
                    $(".tokenError").text("This Field is required");
                    $(".tokenError").css("color","#d9534f");
                    $("#pass").attr('disabled', 'disabled');
                    $("#repass").attr('disabled', 'disabled');
               }
          });

          $(".hp").on('click',function(){
               var passInput=$("#pass");
               if(passInput.attr('type')==='password'){
                   passInput.attr('type','text');
                   $('#he').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
               }else{
                  passInput.attr('type','password');
                  $('#he').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
               }
          });

          $(".hp1").on('click',function(){
               var passInput1=$("#repass");
               if(passInput1.attr('type')==='password'){
                   passInput1.attr('type','text');
                   $('#he1').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
               }else{
                  passInput1.attr('type','password');
                  $('#he1').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
               }
          });

     });
});