<?php get_header() ?>
<?php get_sidebar() ?>
<div id="content">  <!--CONTENT SECTION STARTS-->

    <h2>Results<span class="arrow"></span></h2>
    <h3>This page is under Construction. </h3>


    <script type="text/javascript">

        new phpimagealbum({
            albumvar: myvacation, //ID of photo album to display (based on getpics.php?id=xxx)
            dimensions: [4,1],
            sortby: ["file", "asc"], //["file" or "date", "asc" or "desc"]
            autodesc: "Photo %i", //Auto add a description beneath each picture? (use keyword %i for image position, %d for image date)
            showsourceorder: false, //Show source order of each picture? (helpful during set up stage)
            onphotoclick:function(thumbref, thumbindex, thumbfilename){
                thumbnailviewer.loadimage(thumbref.src, "fit2screen")
            }
        })

    </script>


</div> <!--CONTENT SECTION ENDS-->
<?php get_footer() ?>