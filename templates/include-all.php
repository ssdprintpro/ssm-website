<?php 

    switch ($inst) {
        case 'ssmpu':
            $id_x = 2;
            $course = "/templates/contents/SSMPUC/courses.php";
            $hod= "/templates/contents/SSMPUC/headmistress.php";
            $link_id = '?instId=2&inst=ssmpu';
            $link_name = '?inst=ssmpu';
            $faculty_pth = '/templates/contents/SSMPUC/faculty.php';
            $logo = '/assets/logo/SSM.png';
            $slide_images = ['1.jpg','1.jpg','1.jpg'];
            break;

        case 'ssmphs':
            $id_x = 1;
            $course = "/templates/contents/SSMPHS/courses.php";
            $hod= "/templates/contents/SSMPHS/headmistress.php";
            $link_id = '?instId=1&inst=ssmphs';
            $link_name = '?inst=ssmphs';
            $faculty_pth = '/templates/contents/SSMPHS/faculty.php';
            $logo = '/assets/logo/SSMHS.png';
            $slide_images = ['2.jpg','7.jpg','10.jpg'];
            break;

        case 'ssmns':
            $id_x = 4;
            $course = "/templates/contents/SSMNS/courses.php";
            $hod = "/templates/contents/SSMNS/headmistress.php";
            $link_id = '?instId=4&inst=ssmns';
            $link_name = '?inst=ssmns';
            $faculty_pth = '/templates/contents/SSMNS/faculty.php';
            $logo = '/assets/logo/SSMNS.png';
            $slide_images = ['2.jpg','1.jpg','3.jpg'];
            break;

        case 'ssmps':
            $id_x = 3;
            $course = "/templates/contents/SSMPS/courses.php";
            $hod = "/templates/contents/SSMPS/headmistress.php";
            $link_id = '?instId=3&inst=ssmps';
            $link_name = '?inst=ssmps';
            $faculty_pth = '/templates/contents/SSMPS/faculty.php';
            $logo = '/assets/logo/SSMPS.png';
            $slide_images = ['11.jpg','12.jpg','13.jpg'];
            break;
        
        default:
            $id_x = 0;
            $link_id = '';
            $link_name = '';
            $link_id = '';
            $link_name = '';
            $faculty_pth = '';
            $logo = '/assets/logo/SSM.png';
            $slide_images = ['9.jpg','5.jpg','6.jpg'];
            break;
    }