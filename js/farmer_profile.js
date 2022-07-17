$(document).ready(function(){
    $(function(){
        if($("#stat").text()=="Single"){
            $(".spousename").hide();
        }else{
            $(".spousename").show();
        }
    });

    $(function(){
        if($("#indi").text()=="No"){
            $("#indi1").hide();
        }else{
            $("#indi1").show();
        }
    });

    $(function(){
        if($("#govid").text()=="No"){
            $("#govid1").hide();
        }else{
            $("#govid1").show();
        }
    });

    $(function(){
        if($("#memfac").text()=="No"){
            $("#memfac1").hide();
        }else{
            $("#memfac1").show();
        }
    });

    $(function(){
        if($("#ext").text()==""){
            $("#extplat").hide();
        }else{
            $("#extplat").show();
        }
    });

    $(function(){
        if($("#hhead").text()=="Yes"){
            $("#nohead").hide();
            $("#nohead1").hide();
        }else{
            $("#nohead").show();
            $("#nohead1").show();
        }
    });

    $(function(){
        if($("#livelihood").text()=="Main Livelihood: Farmer"){
            $("#farmworker").hide();
        }else if($("#livelihood").text()=="Main Livelihood: Farmworker"){
            $("#farmer").hide();
        }
    });

    $(function(){
        if($("#livelihood1").text()=="Farmer"){
            $("#farmworker1").hide();
            $("#ofarmworker1").hide();
            $("#farmer1").show();
            $("#ofarmer1").show();
        }else if($("#livelihood1").text()=="Farmworker"){
            $("#farmer1").hide();
            $("#ofarmer1").hide();

            $("#farmworker1").show();
            $("#ofarmworker1").show();
        }
    });

    $(function(){
        if($("#fact").text() == "Rice" || $("#fact").text() == "Corn"){
            $("#ofarmer1").hide();
            $("#ofarmworker1").hide();
        }else{
            $("#ofarmer1").show();
        }

        if($("#kiw").text() == "Land_Preparation" || $("#kiw").text() == "Planting/Transplanting"||$("#kiw").text() == "Cultivation"||$("#kiw").text() == "Harvesting"){
            $("#ofarmworker1").hide();
        }else{
            $("#ofarmworker1").show();
        }
    });
    
    
});
