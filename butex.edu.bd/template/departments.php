<?php get_header(); ?>
<?php get_sidebar(); ?>


<div id="content">  <!--CONTENT SECTION STARTS-->
    <?php
    $SERVER_NAME = $_SERVER['SERVER_NAME'];
    $link_allied_dept = "http://$SERVER_NAME/ae.butex.edu.bd";
    ?>
    <h2 style="width: 33%">Faculty & Departments<span class="arrow"></span></h2>

    <br />

    <div id="department">
        <ol>
            <li><div id="department_name"><h3>Faculty of Textile Manufacturing Engineering</h3></li>
            <ol>
                <li>Faculty of Textile Manufacturing Engineering</li>
                <li>Department of Fabric Manufacturing Engineering</li>
            </ol>
            <br />

            <li><h3>Faculty of Textile Manufacturing Engineering</h3></li>
            <ol>
                <li>Department of Wet Processing Engineering</li>
                <li>Department of Applied Science</li>
                <li>
                    <?php
                    echo "<a href='$link_allied_dept' target='_blank'>Department of Allied Engineering</a>";
                    ?>
                </li>
            </ol>
            <br />
            <li><h3>Faculty of Textile Clothing, Fashion Design and Business Studies</h3></li>
            <ol>
                <li>Department of Apparel Manufacturing Engineering</li>
                <li>Department of Textile Management</li>
                <li>Department of Fashion Design</li>
            </ol>
        </ol>
    </div>
</div> <!--CONTENT SECTION ENDS-->

<?php get_footer(); ?>