<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
        Domain name generator - find the perfect business name that's available as a .com
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:600' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">


    <script src="//code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="//code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href='//fonts.googleapis.com/css?family=Varela Round' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->
<i class="phone_android"></i>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Varela Round", sans-serif}
body, html, {
    height: 100%;
    line-height: 1.8;
}

.w3-bar .w3-button {
    padding: 16px;
}
.w3-bar {
    overflow:visible !important;
}
</style>

	<!--[if gte IE 9]>
	  <style type="text/css">
	    .gradient {
	       filter: none;
	    }
	  </style>
	<![endif]-->


</head>
<body>


    <div class="container inner-application-wrapper">

    <style>
        .not{
            color:red;
        }
        .yes{
            color: green;
            font-weight:bold;
        }
        .yes, .no{
            margin:0.4em;
        }
        .btn-action{
            margin-left:0.5em;
        }
        #results{
            font-size: 110%;
            width:100%;
            text-align:center;
            margin:0.5em auto;
            line-height: 35px;
        }
        $results table tbody tr td{
            line-height: 40px !important;
        }
        p{
            font-family: 'Open Sans', sans-serif;
            text-align:left;
            font-size: 16px;
    color: #1D1D1D;
    line-height: 25px;
        }
    </style>

 <div class="container" style="min-height:600px;">

        <div class="row">
            <div class="col-lg-12 text-center">

                <h1><?=_('Domain Name Generator') ?></h1>

                <h3 id="domain-to-search"></h3>

                <p>
                Use the FlippinMadness domain name generator to search for a domain name to buy.
                </p><p>This service is in beta version and may have a delay loading results.
                </p>

                <input type="text" id="domain-search" value="" placeholder="Enter a search term or blank for random">&nbsp;
                <select name="charlength" id="charlength" class="form-control">
                <option value="0" selected>--- select max char length ---</option>
                <?php for($l=5;$l<105;$l+=5) :?>
                <option value="<?=$l;?>"><?=$l;?></option>
                <?php endfor; ?>
                </select>
                <br>
                <input type="button" id="generate" class="btn btn-warning btn-lg" value="Search" style="width:100%">
                <div id="results" class="table-responsive">

                    <table class="table table-hover">
                        <tbody id="tr-append-domains">

                        </tbody>
                    </table>

                </div>

            </div>
        </div>

</div>

    <script>

        function buy(domain){
            document.write('<scr'+'ipt src="//rtb.adx1.com/pixels/pixel.js?id=264593&event=conversion&value=1"><\/scr'+'ipt>');
            window.open("https://www.namecheap.com/domains/registration/results.aspx?domain="+domain+"&affId=104184", "_blank");
        }

        $(document).keypress(function(e) {
            if(e.which == 13) {
                $("#generate").click();
            }
        });

        $(document).ready(function(){


            $("#generate").click(function(){
                $("#tr-append-domains").html("<tr><td>loading results, please wait....</td></tr>");
                $.getJSON("domaingenerator.php?generate=random&search=" + escape($("#domain-search").val()) + "&charlength=" + $("#charlength").val(),function(result){
                    var html = '';
                    $.each(result, function(key, val){
                        var splitval = val.split("|");
                        var title = splitval[0].split(".");

                        $("#domain-to-search").html("<a target='_blank' href='http://www.dictionary.com/browse/"+title[0]+"?s=t'>"+title[0]+"</a>");

                        if(splitval[1] == "no")
                        {
                            html += "<tr><td><div class='not'>" + splitval[0] + "</div></td><td><span class='btn btn-danger'>Not Available</span></td></tr>";
                        }
                        else
                        {
                            html += "<tr><td><span class'domain'>" + splitval[0] + "</span></td>"
                            + "<td><input type='button' data-domain='"+splitval[0]+"' class='btn-action btn btn-success buy' onclick='javascript:buy(\""+splitval[0]+"\");' value='Buy'>"
                            + "&nbsp;<a class=\"btn-info btn\" href=\"https://twitter.com/intent/tweet?text=" + encodeURIComponent(splitval[0] + ' available at https://market.flippinmadness.com/generator?d='+title[0]+'&utm_source=twitter&utm_medium=link&utm_campaign=domain-mining #flipthisdomain #domainmined') + "\" target=\"_blank\">tweet</a></td></tr>";
                        }

                        $("#tr-append-domains").html(html);
                    });
                });
            });

            <?php if(isset($_GET['d']) && $_GET['d'] != "") :?>
        		$('#generate').click();
        	<?php endif; ?>
        });
    </script>

<?php require_once ('parts/footer.php'); ?>

<?php
/*

namejet

Pending Deletion
http://www.namejet.com/download/10-10-2016.txt

Auctions and Listings
http://www.namejet.com/download/StandardAuctions.csv



*/
?>
