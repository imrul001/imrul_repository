<?php

if (logged_in()) {
    $std_id = isset($_GET['std_id']) ? $_GET['std_id'] : '';
    $sql = "SELECT * FROM input WHERE std_id=$std_id";
    $result = mysql_query($sql);
    while ($row = mysql_fetch_array($result)) {
        $student_name = $row['stud_name'];
        $al_dept = $row['al_dept'];
        $mi_dept = $row['mi_dept'];
        $s_ship = $row['s_ship'];
        $session = $row['session'];
        $admission_roll = $row['admission_test_roll_no'];
        $merit_position = $row['merit_position'];
        $dept = $row['dept'];
        $father_name = $row['father_name'];
        $mother_name = $row['mother_name'];
        $dob = $row['dob'];
        $gender = $row['gender'];
        $p_address = $row['p_address'];
        $c_address = $row['c_address'];
        $std_contact_no = $row['stud_contact_no'];
        $gard_contact_no = $row['grd_contact_no'];
        $nationality = $row['nationality'];
        $emr_contact_no = $row['emergency_contact_no'];
        $emr_contact_address = $row['emergency_contact_address'];
        $blood_grp = $row['blood_grp'];
        $ssc_board = $row['ssc_board'];
        $ssc_roll = $row['ssc_roll'];
        $ssc_gpa = $row['ssc_gpa'];
        $ssc_ac = $row['ssc_academic_institute'];
        $ssc_year = $row['ssc_year'];
        $hsc_board = $row['hsc_board'];
        $hsc_ac = $row['hsc_academic_institute'];
        $hsc_year = $row['hsc_year'];
        $hsc_roll = $row['hsc_roll'];
        $hsc_gpa = $row['hsc_gpa'];
        $grd_income = $row['grd_income'];
        $extra_curricular = $row['extra_curricular'];
        $link = $row['link'];
        $religion = $row['religion'];
        $student_status = $row['student_status'];
        if ($link == 'no') {
            $link = 'No_Image.jpg';
        }
        $reg_no = $row['reg_no'];
        $over_rec = $row['over_rec'];

        function chooseProgram($m) {
            $BSC = "B.Sc in Textile Engineering";
            $MSC = "M.Sc in Textile Engineering";
            if ($m[4] == '1') {
                return "B.Sc in Textile Engineering";
            }
            if ($m[4] == '2') {
                return "M.Sc in Textile Engineering";
            }
        }

    }
    define('FPDF_FONTPATH', './template/font/');
    require('fpdf.php');

    $pdf = new FPDF();
    $pdf->AddPage();
//Header
    $pdf->Image('./template/images/logo.gif', 13, 3, 19.5, 25.5, 'GIF');

    $pdf->AddFont('CopperplateGothic-Bold', '', 'a0c4220635c427abeb67a4e7e263494b_coprgtb.php');
    $pdf->SetFont('CopperplateGothic-Bold', '', 20);
    $pdf->SetTextColor(0, 0, 255);
    $pdf->Cell(0, 4, 'Bangladesh University of Textiles', 0, 1, C);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 10, 'Tejgaon,Dhaka 1208', 0, 1, C);

//subheader
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(0, 25, 'STUDENT PROFILE', 0, 1, C);

//
    $pdf->Image('./template/uploaded_student_images/' . $link, 153, 51, 42, 53, 'JPG');
    $pdf->SetFont('Arial', 'B', 9);

    $pdf->Cell(125, 0, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Student ID                        :', 0, 0, L);
    $pdf->Cell(80, 10, $std_id, 0, 0, L);


    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Studnet Name                  :', 0, 0, L);
    $pdf->Cell(80, 10, $student_name, 0, 0, L);


    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Registration No.                :', 0, 0, L);
    $pdf->Cell(80, 10, $reg_no, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Department Name             :', 0, 0, L);
    $pdf->Cell(80, 10, $dept, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Course/Program Title        :', 0, 0, L);
    $pdf->Cell(80, 10, chooseProgram($std_id), 0, 0, L);


    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Session                             :', 0, 0, L);
    $pdf->Cell(80, 10, $session, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Student Contact No.         :', 0, 0, L);
    $pdf->Cell(80, 10, $std_contact_no, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Current Address.              :', 0, 0, L);
    $pdf->Cell(80, 10, $c_address, 0, 0, L);

    $pdf->Cell(0, 13, '', 0, 1, C);

//subheader
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(0, 15, 'Basic Information', 0, 1, C);


    $pdf->SetFont('Arial', '', 9);

    $pdf->Cell(125, 3, '', 0, 1, L);
    $pdf->Cell(50, 10, "Father's Name                   :", 0, 0, L);
    $pdf->Cell(90, 10, $father_name, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, "Mother's Name                  :", 0, 0, L);
    $pdf->Cell(90, 10, $mother_name, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Date of Birth                      :', 0, 0, L);
    $pdf->Cell(90, 10, $dob, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Parmanent Address          :', 0, 0, L);
    $pdf->Cell(90, 10, $p_address, 0, 0, L);


    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Nationality                         :', 0, 0, L);
    $pdf->Cell(90, 10, $nationality, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Gender                              :', 0, 0, L);
    $pdf->Cell(90, 10, $gender, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Blood Group                      :', 0, 0, L);
    $pdf->Cell(90, 10, $blood_grp, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Religion                             :', 0, 0, L);
    $pdf->Cell(90, 10, $religion, 0, 0, L);

    $pdf->Cell(0, 10, '', 0, 1, C);
//subheader
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(0, 7, 'Emargency Information', 0, 1, C);

    $pdf->SetFont('Arial', '', 9);

    $pdf->Cell(125, 5, '', 0, 1, L);
    $pdf->Cell(50, 10, "Guardian Contact No.        :", 0, 0, L);
    $pdf->Cell(90, 10, $gard_contact_no, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, "Emargency Contact No.     :", 0, 0, L);
    $pdf->Cell(90, 10, $emr_contact_no, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Emergency Address           :', 0, 0, L);
    $pdf->Cell(90, 10, $emr_contact_address, 0, 0, L);

    $pdf->Cell(0, 10, '', 0, 1, C);
//subheader
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(0, 5, 'Admission Information', 0, 1, C);

    $pdf->SetFont('Arial', '', 9);

    $pdf->Cell(125, 4, '', 0, 1, L);
    $pdf->Cell(50, 10, "Admissoin Roll No.              :", 0, 0, L);
    $pdf->Cell(90, 10, $admission_roll, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, "Merit Position.                      :", 0, 0, L);
    $pdf->Cell(90, 10, $merit_position, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Alloted Department              :', 0, 0, L);
    $pdf->Cell(90, 10, $al_dept, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Migrated Department           :', 0, 0, L);
    $pdf->Cell(90, 10, $mi_dept, 0, 0, L);

    $pdf->Cell(0, 7, '', 0, 1, C);
//subheader
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(0, 15, 'Academic Information', 0, 1, C);
    $pdf->SetFont('Arial', 'B', 9);
    $pdf->Cell(31, 10, "Examination", LT, 0, C);
    $pdf->Cell(62, 10, "Institution", LT, 0, C);
    $pdf->Cell(31, 10, "Board", LT, 0, C);
    $pdf->Cell(25, 10, "Exam. Year", LT, 0, C);
    $pdf->Cell(25, 10, "Exam. Roll", LT, 0, C);
    $pdf->Cell(18, 10, "GPA", LTR, 0, C);
    $pdf->SetFont('Arial', '', 9);

    $pdf->Cell(31, 10, "", 0, 1, C);
    $pdf->Cell(31, 10, "SSC", LTR, 0, C);
    $pdf->Cell(62, 10, $ssc_ac, TR, 0, C);
    $pdf->Cell(31, 10, $ssc_board, TR, 0, C);
    $pdf->Cell(25, 10, $ssc_year, TR, 0, C);
    $pdf->Cell(25, 10, $ssc_roll, TR, 0, C);
    $pdf->Cell(18, 10, $ssc_gpa, TR, 0, C);

    $pdf->Cell(31, 10, "", 0, 1, C);
    $pdf->Cell(31, 10, "HSC", LTRB, 0, C);
    $pdf->Cell(62, 10, $hsc_ac, LTB, 0, C);
    $pdf->Cell(31, 10, $hsc_board, LTB, 0, C);
    $pdf->Cell(25, 10, $hsc_year, LTB, 0, C);
    $pdf->Cell(25, 10, $hsc_roll, LTB, 0, C);
    $pdf->Cell(18, 10, $hsc_gpa, LTBR, 0, C);

    $pdf->Cell(31, 10, "", 0, 1, C);

//subheader

    $sql = "SELECT * FROM result_status WHERE student_id=$std_id ORDER BY entry_date_time ASC";
    $result = mysql_query($sql);
    $num_row = mysql_num_rows($result);

    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(0, 10, 'Results', 0, 1, C);
    $pdf->SetFont('Arial', 'B', 9);

    if ($num_row > 0) {
        $pdf->Cell(32, 10, "Level-Term", LT, 0, C);
        $pdf->Cell(23, 10, "Exam. Year", LT, 0, C);
        $pdf->Cell(38, 10, "Term/Subject GPA", LT, 0, C);
        $pdf->Cell(14, 10, "CGPA", LT, 0, C);
        $pdf->Cell(45, 10, "Fail/Retake Subjects", LT, 0, C);
        $pdf->Cell(40, 10, "Remarks", LTR, 0, C);

        $pdf->SetFont('Arial', '', 9);
        $pdf->Cell(31, 10, "", 0, 1, C);
    }

    if (!empty($result)) {
        $i = 1;
        while ($row = mysql_fetch_array($result)) {
            if ($i == $num_row) {
                $pdf->Cell(32, 10, getLevelTerm($row['level_term']), LTB, 0, C);
                $pdf->Cell(23, 10, $row['exam_year'], LTB, 0, C);
                $pdf->Cell(38, 10, $row['gpa'], LTB, 0, C);
                $pdf->Cell(14, 10, $row['cgpa'], LTB, 0, C);
                $pdf->Cell(45, 10, $row['backlog_subject'], LTB, 0, C);
                $pdf->Cell(40, 10, $row['remarks'], LTRB, 0, C);
                $pdf->Cell(31, 10, '', 0, 1, C);
            } else {
                $pdf->Cell(32, 10, getLevelTerm($row['level_term']), LT, 0, C);
                $pdf->Cell(23, 10, $row['exam_year'], LT, 0, C);
                $pdf->Cell(38, 10, $row['gpa'], LT, 0, C);
                $pdf->Cell(14, 10, $row['cgpa'], LT, 0, C);
                $pdf->Cell(45, 10, $row['backlog_subject'], LT, 0, C);
                $pdf->Cell(40, 10, $row['remarks'], LTR, 0, C);
                $pdf->Cell(31, 10, '', 0, 1, C);
            }
            $i++;
        }
    }
    $pdf->Cell(31, 10, "", 0, 1, C);
//subheader
    $pdf->SetFont('Arial', 'B', 13);
    $pdf->Cell(0, 10, 'Other Information', 0, 1, C);


    $pdf->SetFont('Arial', '', 9);

    $pdf->Cell(125, 2, '', 0, 1, L);
    $pdf->Cell(50, 10, "Guardian .                               :", 0, 0, L);
    $pdf->Cell(90, 10, $grd_income, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, "Extra Curricular Activities        :", 0, 0, L);
    $pdf->Cell(90, 10, $extra_curricular, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Punishment                             :', 0, 0, L);
    $pdf->Cell(90, 10, '', 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Warning                                   :', 0, 0, L);
    $pdf->Cell(90, 10, '', 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Overall Record                        :', 0, 0, L);
    $pdf->Cell(90, 10, $over_rec, 0, 0, L);

    $pdf->Cell(125, 10, '', 0, 1, L);
    $pdf->Cell(50, 10, 'Student Status                        :', 0, 0, L);
    $pdf->Cell(90, 10, $student_status, 0, 0, L);

    $pdf->Cell(31, 30, "", 0, 1, C);

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(0, 4, 'Report Generated by BUTex Student Information System', 0, 1, C);
    $pdf->SetFont('CopperplateGothic-Bold', '', 11);
    $pdf->Cell(0, 6, 'Bangladesh University of Textiles', 0, 1, C);



    $pdf->Output();
}else{
    echo 'Invalid Access';
}
?>
<?php

function getLevelTerm($lt) {
    $level = $lt[1];
    $term = $lt[3];
    $levelTermText = 'Level-' . $level . ',Term-' . $term . '';
    return $levelTermText;
}
?>
