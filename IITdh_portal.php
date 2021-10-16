<!DOCTYPE html>
<?php
    $user = 'root';
    $pass = '';
    $con = new mysqli('localhost', $user, $pass);
    if($con->connect_error)
    {
        die("Connection Error: " . $con->connect_error);
    }
    $sql = 'CREATE DATABASE IF NOT EXISTS trupendb';
    if($con->query($sql) === False)
    {
        die("Error: ". $con->error);
    }
    $con = new mysqli('localhost', $user, $pass, 'trupendb');
    $sql = 'CREATE TABLE IF NOT EXISTS user
            (username varchar(120) PRIMARY KEY,
            passcode varchar(120),
            firstname varchar(120),
            lastname varchar(120),
            email varchar(120) unique,
            gender varchar(120),
            birthday varchar(120),
            bio varchar(800),
            img_dir varchar(120)
            )';
    if ($con->query($sql) === FALSE)
    {
        die("Error creating table: " . $con->error);
    }
    $sql = "SELECT * FROM user";
    $result = $con->query($sql) or die("Error: ". $con->error);
    if($result->num_rows == 0)
    {
        $sql = "INSERT INTO user(username, passcode, firstname, lastname, email, gender, birthday, bio, img_dir)
                VALUES ('user', 'pass', 'foo', 'bar', 'user@gmail.com', 'male', '2000-08-14', 'fantastic person', 'profile_pic/student/user.jpg')";
        $con->query($sql);
        $sql = "INSERT INTO user(username, passcode, firstname, lastname, email, gender, birthday, bio, img_dir)
                VALUES ('eval', 'eva', 'eval', 'eva', 'eval@gmail.com', 'female', '2003-05-17', 'cool person', 'profile_pic/student/eval.jpg')";
        $con->query($sql);
    }
    $sql = 'CREATE TABLE IF NOT EXISTS teacher
            (username varchar(120) PRIMARY KEY,
            passcode varchar(120),
            firstname varchar(120),
            lastname varchar(120),
            email varchar(120) unique,
            gender varchar(120),
            birthday varchar(120),
            subject varchar(120),
            img_dir varchar(120)
            )';
    if ($con->query($sql) === FALSE)
    {
        die("Error creating table: " . $con->error);
    }
    $sql = "SELECT * FROM teacher";
    $result = $con->query($sql) or die("Error: ". $con->error);
    if($result->num_rows == 0)
    {
        $sql = "INSERT INTO teacher(username, passcode, firstname, lastname, email, gender, birthday, subject, img_dir)
                VALUES ('user', 'pass', 'foo', 'bar', 'user@gmail.com', 'male', '2000-08-14', 'MA101', 'profile_pic/teacher/user.jpg')";
        $con->query($sql);
    }
    $sql = 'CREATE TABLE IF NOT EXISTS quiz
            (name varchar(120),
            subject varchar(120),
            time_limit smallint(6),
            no_questions smallint(6),
            total smallint(6),
            UNIQUE(name, subject)
            )';
    if ($con->query($sql) === FALSE)
    {
        die("Error creating table: " . $con->error);
    }
    $sql = 'CREATE TABLE IF NOT EXISTS print
            (No int NOT NULL AUTO_INCREMENT,
            user varchar(120),
            location varchar(120),
            copies smallint(6),
            type varchar(120),
            status smallint(6),
            comment varchar(120),
            PRIMARY KEY (No)
            )';
    if ($con->query($sql) === FALSE)
    {
        die("Error creating table: " . $con->error);
    }
?>
<html lang="en" >
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
            * {
                outline: none;
                box-sizing: border-box;
            }

            :root {
                --body-bg-color: #e5ecef;
                --theme-bg-color: #fafafb;
                --body-font: "Poppins", sans-serif;
                --body-color: #2f2f33;
                --active-color: #0162ff;
                --active-light-color: #e1ebfb;
                --header-bg-color: #fff;
                --search-border-color: #efefef;
                --border-color: #d8d8d8;
                --alert-bg-color: #e8f2ff;
                --subtitle-color: #83838e;
                --inactive-color: #f0f0f0;
                --placeholder-color: #9b9ba5;
                --time-button: #fc5757;
                --level-button: #5052d5;
                --button-color: #fff;
            }

            .dark-mode {
                --body-bg-color: #1d1d1d;
                --theme-bg-color: #13131a;
                --header-bg-color: #1c1c24;
                --alert-bg-color: #292932;
                --body-color: #fff;
                --inactive-color: #292932;
                --time-button: #fff;
                --level-button: #fff;
                --active-light-color: #263d63;
                --border-color: #26262f;
                --search-border-color: #26262f;
            }

            ::-moz-placeholder {
                color: var(--placeholder-color);
            }

            :-ms-input-placeholder {
                color: var(--placeholder-color);
            }

            ::placeholder {
             color: var(--placeholder-color);
            }

            img {
                max-width: 100%;
            }

            html {
                box-sizing: border-box;
                -webkit-font-smoothing: antialiased;
            }

            body {
                background-color: var(--body-bg-color);
                font-family: var(--body-font);
                font-size: 15px;
                color: var(--body-color);
            }

            .dark-light svg {
                margin-right: 8px;
                width: 22px;
                cursor: pointer;
                fill: transparent;
                transition: 0.5s;
            }

            .dark-mode .dark-light svg {
                fill: #ffce45;
                stroke: #ffce45;
            }
            .dark-mode .job-card svg {
             box-shadow: none;
            }
            .dark-mode .search.item {
                color: var(--body-color);
                border-color: var(--body-color);
            }
            .dark-mode .search-location svg,
                .dark-mode .search-job svg,
                .dark-mode .search-salary svg {
                color: var(--body-color);
            }
            .dark-mode .detail-button {
                background-color: var(--inactive-color);
                color: var(--subtitle-color);
            }

            .job {
                display: flex;
                flex-direction: column;
                max-width: 1400px;
                height: 100vh;
                margin: 0 auto;
                overflow: hidden;
                background-color: var(--theme-bg-color);
            }

            .logo {
                display: flex;
                align-items: center;
                font-weight: 600;
                font-size: 18px;
                cursor: pointer;
            }
            .logo svg {
                width: 24px;
                margin-right: 12px;
            }

            .header {
                display: flex;
                align-items: center;
                transition: box-shadow 0.3s;
                flex-shrink: 0;
                padding: 0 40px;
                white-space: nowrap;
                background-color: var(--header-bg-color);
                height: 60px;
                width: 100%;
                font-size: 14px;
                justify-content: space-between;
            }
            .header-menu a {
                text-decoration: none;
                color: var(--body-color);
                font-weight: 500;
            }
            .header-menu a:hover {
                color: var(--active-color);
            }
            .header-menu a:not(:first-child) {
                margin-left: 30px;
            }
            .header-menu a.active {
                color: var(--active-color);
            }

            .user-settings {
                display: flex;
                align-items: center;
                font-weight: 500;
            }
            .user-settings svg {
                width: 20px;
                color: #94949f;
            }

            .user-menu {
                position: relative;
                margin-right: 8px;
                padding-right: 8px;
                border-right: 2px solid #d6d6db;
            }
            .user-menu:before {
                position: absolute;
                content: "";
                width: 7px;
                height: 7px;
                border-radius: 50%;
                border: 2px solid var(--header-bg-color);
                right: 6px;
                top: -1px;
                background-color: var(--active-color);
            }

            .user-profile {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            -o-object-fit: cover;
            object-fit: cover;
            margin-right: 10px;
            }

            .wrapper {
            width: 100%;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            scroll-behavior: smooth;
            padding: 30px 40px;
            overflow: auto;
            }

            .search-menu {
            height: 56px;
            white-space: nowrap;
            display: flex;
            flex-shrink: 0;
            align-items: center;
            background-color: var(--header-bg-color);
            border-radius: 8px;
            width: 100%;
            padding-left: 20px;
            }
            .search-menu div:not(:last-of-type) {
            border-right: 1px solid var(--search-border-color);
            }

            .search-bar {
            height: 55px;
            width: 100%;
            position: relative;
            }
            .search-bar input {
            width: 100%;
            height: 100%;
            display: block;
            background-color: transparent;
            border: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 56.966 56.966' fill='%230162ff'%3e%3cpath d='M55.146 51.887L41.588 37.786A22.926 22.926 0 0046.984 23c0-12.682-10.318-23-23-23s-23 10.318-23 23 10.318 23 23 23c4.761 0 9.298-1.436 13.177-4.162l13.661 14.208c.571.593 1.339.92 2.162.92.779 0 1.518-.297 2.079-.837a3.004 3.004 0 00.083-4.242zM23.984 6c9.374 0 17 7.626 17 17s-7.626 17-17 17-17-7.626-17-17 7.626-17 17-17z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-size: 14px;
            background-position: 0 50%;
            padding: 0 25px 0 305px;
            }

            .search-location,
            .search-job,
            .search-salary {
            display: flex;
            align-items: center;
            width: 50%;
            font-size: 14px;
            font-weight: 500;
            padding: 0 25px;
            height: 100%;
            }
            .search-location input,
            .search-job input,
            .search-salary input {
            width: 100%;
            height: 100%;
            display: block;
            background-color: transparent;
            border: none;
            }
            .search-location svg,
            .search-job svg,
            .search-salary svg {
            margin-right: 8px;
            width: 18px;
            color: var(--active-color);
            flex-shrink: 0;
            }

            .search-button {
            background-color: var(--active-color);
            height: 55px;
            border: none;
            font-weight: 600;
            font-size: 14px;
            padding: 0 15px;
            border-radius: 0 8px 8px 0;
            color: var(--button-color);
            cursor: pointer;
            margin-left: auto;
            }

            .search.item {
            position: absolute;
            top: 10px;
            left: 25px;
            font-size: 13px;
            color: var(--active-color);
            border: 1px solid var(--search-border-color);
            padding: 8px 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            }
            .search.item svg {
            width: 12px;
            margin-left: 5px;
            }
            .search.item:last-child {
            left: 185px;
            }

            .main-container {
            display: flex;
            flex-grow: 1;
            padding-top: 30px;
            }

            .search-type {
            width: 270px;
            display: flex;
            flex-direction: column;
            height: 100%;
            flex-shrink: 0;
            }

            .alert {
            background-color: var(--alert-bg-color);
            padding: 24px 18px;
            border-radius: 8px;
            }
            .alert-title {
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
            }
            .alert-subtitle {
            font-size: 13px;
            color: var(--subtitle-color);
            line-height: 1.6em;
            margin-bottom: 20px;
            }
            .alert input {
            width: 100%;
            padding: 10px;
            display: block;
            border-radius: 6px;
            background-color: var(--header-bg-color);
            border: none;
            font-size: 13px;
            }

            .search-buttons {
            border: none;
            color: var(--button-color);
            background-color: var(--active-color);
            padding: 8px 10px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 14px;
            }

            .job-wrapper {
            padding-top: 20px;
            }

            .job-time {
            padding-top: 20px;
            }
            .job-time-title {
            font-size: 14px;
            font-weight: 500;
            }

            .type-container {
            display: flex;
            align-items: center;
            color: var(--subtitle-color);
            font-size: 13px;
            }
            .type-container label {
            margin-left: 2px;
            display: flex;
            align-items: center;
            cursor: pointer;
            }
            .type-container + .type-container {
            margin-top: 10px;
            }

            .job-number {
            margin-left: auto;
            background-color: var(--inactive-color);
            color: var(--subtitle-color);
            font-size: 10px;
            font-weight: 500;
            padding: 5px;
            border-radius: 4px;
            }

            .job-style {
            display: none;
            }

            .job-style + label:before {
            content: "";
            margin-right: 10px;
            width: 16px;
            height: 16px;
            border: 1px solid var(--subtitle-color);
            border-radius: 4px;
            cursor: pointer;
            }

            .job-style:checked + label:before {
            background-color: var(--active-color);
            border-color: var(--active-color);
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%23fff' stroke-width='3' stroke-linecap='round' stroke-linejoin='round' class='feather feather-check'%3e%3cpath d='M20 6L9 17l-5-5'/%3e%3c/svg%3e");
            background-position: 50%;
            background-size: 14px;
            background-repeat: no-repeat;
            }

            .job-style:checked + label + span {
            background-color: var(--active-light-color);
            color: var(--active-color);
            }

            .searched-jobs {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding-left: 40px;
            }

            @-webkit-keyframes slideY {
            0% {
            opacity: 0;
            transform: translateY(200px);
            }
            }

            @keyframes slideY {
            0% {
            opacity: 0;
            transform: translateY(200px);
            }
            }
            .searched-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            -webkit-animation: slideY 0.6s both;
            animation: slideY 0.6s both;
            }
            .searched-show {
            font-size: 19px;
            font-weight: 600;
            }
            .searched-sort {
            font-size: 14px;
            color: var(--subtitle-color);
            }
            .searched-sort .post-time {
            font-weight: 600;
            color: var(--subtitle-color);
            }
            .searched-sort .menu-icon {
            font-size: 9px;
            color: var(--placeholder-color);
            margin-left: 6px;
            }

            .job-cards {
            padding-top: 20px;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-column-gap: 25px;
            grid-row-gap: 25px;
            -webkit-animation: slideY 0.6s both;
            animation: slideY 0.6s both;
            }
            @media screen and (max-width: 1212px) {
            .job-cards {
            grid-template-columns: repeat(2, 1fr);
            }
            }
            @media screen and (max-width: 930px) {
            .job-cards {
            grid-template-columns: repeat(1, 1fr);
            }
            }

            .job-card {
            padding: 20px 16px;
            background-color: var(--header-bg-color);
            border-radius: 8px;
            transition: 0.2s;
            }
            .job-card:hover {
            transform: scale(1.02);
            }
            .job-card svg {
            width: 46px;
            padding: 10px;
            border-radius: 8px;
            }
            .job-card-title {
            font-weight: 600;
            margin-top: 16px;
            font-size: 14px;
            }
            .job-card-subtitle {
            color: var(--subtitle-color);
            font-size: 13px;
            margin-top: 14px;
            line-height: 1.6em;
            }
            .job-card-header {
            display: flex;
            align-items: flex-start;
            }

            .overview-card:hover {
            background: #2b2ecf;
            transition: none;
            transform: scale(1);
            }
            .overview-card:hover svg {
            box-shadow: none;
            }
            .overview-card:hover .job-overview-buttons .search-buttons.time-button,
            .overview-card:hover .job-overview-buttons .search-buttons.level-button {
            background-color: #575ad8;
            color: #fff;
            }
            .overview-card:hover .job-card-title,
            .overview-card:hover .job-stat {
            color: #fff;
            }
            .overview-card:hover .job-card-subtitle,
            .overview-card:hover .job-day {
            color: #dedede;
            }
            .overview-card:hover .overview-wrapper .heart {
            color: #fff;
            border-color: #fff;
            }
            .overview-card:hover .overview-wrapper .heart:hover {
            fill: red;
            stroke: red;
            transform: scale(1.1);
            }

            .detail-button {
            background-color: var(--active-light-color);
            color: var(--active-color);
            font-size: 11px;
            font-weight: 500;
            padding: 6px 8px;
            border-radius: 4px;
            }
            .detail-button + .detail-button {
            margin-left: 4px;
            }

            .job-card-buttons {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            margin-top: 4px;
            }

            .card-buttons,
            .card-buttons-msg {
            padding: 10px;
            width: 100%;
            font-size: 12px;
            cursor: pointer;
            }

            .card-buttons {
            margin-right: 12px;
            }
            .card-buttons:hover span{
            transform: scale(1.1);
            padding-right: 25px;
            }
            .card-buttons span {
            display: inline-block;
            position: relative;
            transition: 0.5s;
            }
            .card-buttons span:after {
                content: '\00bb';
                opacity: 0;
                transition: 0.5s;
            }

            .card-buttons:hover span:after {
            opacity: 1;
            }
            .card-buttons-msg {
            background-color: var(--inactive-color);
            color: var(--subtitle-color);
            }

            .card-buttons-msg:hover span{
            transform: scale(1.1);
            padding-right: 25px;
            }
            .card-buttons-msg span {
            display: inline-block;
            position: relative;
            transition: 0.5s;
            }
            .card-buttons-msg span:after {
                content: '\00bb';
                opacity: 0;
                transition: 0.5s;
            }

            .card-buttons-msg:hover span:after {
            opacity: 1;
            }

            .menu-dot {
            background-color: var(--placeholder-color);
            box-shadow: -6px 0 0 0 var(--placeholder-color), 6px 0 0 0 var(--placeholder-color);
            width: 4px;
            height: 4px;
            border: 0;
            padding: 0;
            border-radius: 50%;
            margin-left: auto;
            margin-right: 8px;
            }

            .header-shadow {
            box-shadow: 0 4px 20px rgba(88, 99, 148, 0.17);
            z-index: 1;
            }

            @-webkit-keyframes slide {
            0% {
            opacity: 0;
            transform: translateX(300px);
            }
            }

            @keyframes slide {
            0% {
            opacity: 0;
            transform: translateX(300px);
            }
            }
            .job-overview {
            display: flex;
            flex-grow: 1;
            display: none;
            -webkit-animation: slide 0.6s both;
            animation: slide 0.6s both;
            }
            .job-overview-cards {
            display: flex;
            flex-direction: column;
            width: 330px;
            height: 100%;
            flex-shrink: 0;
            }
            .job-overview-card + .job-overview-card {
            margin-top: 20px;
            }
            .job-overview-buttons {
            display: flex;
            align-items: center;
            margin-top: 12px;
            }
            .job-overview-buttons .search-buttons {
            background-color: var(--inactive-color);
            font-size: 11px;
            padding: 6px 8px;
            margin-top: 0;
            font-weight: 500;
            }
            .job-overview-buttons .search-buttons.time-button {
            color: var(--time-button);
            margin-right: 8px;
            }
            .job-overview-buttons .search-buttons.level-button {
            color: var(--level-button);
            }
            .job-overview-buttons .job-stat {
            color: var(--active-color);
            font-size: 12px;
            font-weight: 500;
            margin-left: auto;
            }
            .job-overview-buttons .job-day {
            color: var(--subtitle-color);
            font-size: 12px;
            margin-left: 8px;
            font-weight: 500;
            }
            .job-overview .overview-wrapper {
            display: flex;
            align-items: center;
            }
            .job-overview .overview-wrapper svg:first-child {
            width: 42px;
            margin-right: 10px;
            }
            .job-overview .overview-wrapper .heart {
            background: none;
            box-shadow: none;
            width: 24px;
            padding: 4px;
            color: var(--subtitle-color);
            border: 1px solid var(--border-color);
            margin-left: auto;
            margin-bottom: auto;
            }

            .overview-detail .job-card-title,
            .overview-detail .job-card-subtitle {
            margin-top: 4px;
            }
            .overview-detail .job-card-subtitle {
            font-size: 12px;
            font-weight: 500;
            }

            .job-explain {
            background-color: var(--header-bg-color);
            margin-left: 40px;
            border-radius: 0 0 8px 8px;
            }

            .job-bg {
            border-radius: 8px 8px 0 0;
            -o-object-fit: cover;
            object-fit: cover;
            width: 100%;
            height: 180px;
            transition: 0.3s;
            position: relative;
            }

            .job-logos {
            margin-top: -30px;
            position: relative;
            margin-bottom: -36px;
            padding: 0 20px;
            }
            .job-logos svg {
            width: 66px;
            padding: 12px;
            background-color: #fff;
            border-radius: 10px;
            border: 4px solid var(--header-bg-color);
            }

            .job-title-wrapper {
            display: flex;
            align-items: center;
            }
            .job-title-wrapper .job-card-title {
            font-size: 20px;
            margin-top: 0;
            font-weight: 600;
            }

            .job-action {
            display: flex;
            align-items: center;
            margin-left: auto;
            }
            .job-action svg {
            width: 32px;
            border: 1px solid var(--border-color);
            color: var(--subtitle-color);
            border-radius: 8px;
            padding: 6px;
            }
            .job-action svg + svg {
            margin-left: 12px;
            }

            .job-explain-content {
            padding: 50px 25px 30px;
            }

            .job-subtitle-wrapper {
            display: flex;
            align-items: center;
            margin-top: 20px;
            }
            .job-subtitle-wrapper .posted {
            margin-left: auto;
            }
            .job-subtitle-wrapper .company-name {
            color: var(--active-color);
            font-weight: 600;
            font-size: 14px;
            }
            .job-subtitle-wrapper .comp-location,
            .job-subtitle-wrapper .posted {
            color: var(--subtitle-color);
            font-size: 12px;
            font-weight: 500;
            }
            .job-subtitle-wrapper .comp-location {
            position: relative;
            margin-left: 10px;
            }
            .job-subtitle-wrapper .comp-location:before {
            content: "";
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background-color: var(--placeholder-color);
            top: 49%;
            left: -8px;
            position: absolute;
            }
            .job-subtitle-wrapper .app-number {
            color: var(--body-color);
            position: relative;
            margin-left: 12px;
            }
            .job-subtitle-wrapper .app-number:before {
            content: "";
            width: 3px;
            height: 3px;
            border-radius: 50%;
            background-color: var(--placeholder-color);
            top: 50%;
            left: -7px;
            position: absolute;
            }

            .explain-bar {
            margin-top: 20px;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            display: flex;
            height: 66px;
            padding: 0 16px;
            align-items: center;
            justify-content: space-between;
            }
            .explain-title {
            color: var(--subtitle-color);
            font-size: 12px;
            line-height: 40px;
            white-space: nowrap;
            }
            .explain-subtitle {
            font-size: 13px;
            font-weight: 500;
            margin-top: -2px;
            white-space: nowrap;
            }
            .explain-contents {
            height: 66px;
            }
            .explain-contents + .explain-contents {
            border-left: 1px solid var(--border-color);
            padding-left: 16px;
            }

            .overview-text {
            margin-top: 30px;
            }
            .overview-text-header {
            font-weight: 600;
            margin-bottom: 25px;
            }
            .overview-text-subheader {
            font-size: 13px;
            line-height: 2em;
            }
            .overview-text-item {
            font-size: 13px;
            position: relative;
            display: flex;
            }
            .overview-text-item + .overview-text-item {
            margin-top: 20px;
            }
            .overview-text-item:before {
            content: "";
            border: 2px solid #61bcff;
            border-radius: 50%;
            height: 8px;
            width: 8px;
            margin-right: 8px;
            flex-shrink: 0;
            }

            .detail-page .job-overview {
            display: flex;
            }
            .detail-page .job-cards,
            .detail-page .searched-bar {
            display: none;
            }
            @media screen and (max-width: 1300px) {
            .detail-page .search-type {
            display: none;
            }
            .detail-page .searched-jobs {
            padding-left: 0;
            }
            }

            @media screen and (max-width: 990px) {
            .explain-contents, .explain-bar {
            height: auto;
            }

            .explain-bar {
            flex-wrap: wrap;
            padding-bottom: 14px;
            }

            .explain-contents {
            width: 50%;
            }

            .explain-contents + .explain-contents {
            padding: 0;
            border: 0;
            }

            .explain-contents:nth-child(2) ~ .explain-contents {
            margin-top: 16px;
            border-top: 1px solid var(--border-color);
            }

            .job-subtitle-wrapper {
            flex-direction: column;
            align-items: flex-start;
            }

            .job-subtitle-wrapper .posted {
            margin-left: 0;
            margin-top: 6px;
            }
            }
            @media screen and (max-width: 930px) {
            .search-job, .search-salary {
            display: none;
            }

            .search-bar {
            width: auto;
            }
            }
            @media screen and (max-width: 760px) {
            .detail-page .job-overview-cards {
            display: none;
            }

            .user-name {
            display: none;
            }

            .user-profile {
            margin-right: 0;
            }

            .job-explain {
            margin-left: 0;
            }
            }
            @media screen and (max-width: 730px) {
            .search-type {
            display: none;
            }

            .searched-jobs {
            padding-left: 0;
            }

            .search-menu div:not(:last-of-type) {
            border: 0;
            }

            .job-cards {
            grid-template-columns: repeat(2, 1fr);
            }

            .search-location {
            display: none;
            }
            }
            @media screen and (max-width: 620px) {
            .job-cards {
            grid-template-columns: repeat(1, 1fr);
            }

            .header-menu a:not(:first-child) {
            margin-left: 10px;
            }
            }
            @media screen and (max-width: 590px) {
            .header-menu {
            display: none;
            }
            }
            @media screen and (max-width: 520px) {
            .search.item {
            display: none;
            }

            .search-bar {
            flex-grow: 1;
            }

            .search-bar input {
            padding: 0 0 0 30px;
            }

            .search-button {
            margin-left: 16px;
            }

            .searched-bar {
            flex-direction: column;
            align-items: flex-start;
            }

            .searched-sort {
            margin-top: 5px;
            }

            .main-container {
            padding-top: 20px;
            }
            }
            @media screen and (max-width: 380px) {
            .explain-contents {
            width: 100%;
            margin: 0;
            }

            .explain-contents:nth-child(2) ~ .explain-contents {
            margin: 0;
            border: 0;
            }

            .wrapper {
            padding: 20px;
            }

            .header {
            padding: 0 20px;
            }
            }
        </style>

        <script>
        if (document.location.search.match(/type=embed/gi)) {
        window.parent.postMessage("resize", "*");
        }
        </script>
    </head>

    <body translate="no" >
        <div class="job">
            <div class="header">
                <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="10 0 512 512" fill="#fff" style="background-color:#99ffaa;border-radius:50%;">
                    <g transform="translate(0.000000,512.000000) scale(0.110000,-0.110000)" fill="#000000" stroke="none">
                    <path d="M3234 3848 c-7 -11 6 -28 64 -89 l43 -46 -40 -63 c-23 -35 -41 -71
                    -41 -81 0 -10 -13 -41 -30 -67 -34 -56 -36 -67 -14 -76 17 -7 34 0 34 14 0 5
                    5 21 11 37 l10 27 21 -33 21 -33 -41 -41 -42 -41 -33 32 c-18 18 -40 32 -48
                    32 -8 0 -97 -83 -198 -184 -131 -131 -182 -189 -178 -200 4 -9 14 -16 24 -16
                    10 0 93 75 185 167 167 166 167 167 188 148 21 -19 21 -19 -267 -307 l-288
                    -288 103 -102 102 -103 282 282 c195 194 291 283 308 285 18 2 25 9 25 24 0
                    13 24 47 56 81 31 32 59 69 63 81 9 27 18 28 33 2 12 -19 13 -19 65 5 28 13
                    75 27 104 31 48 6 52 8 58 36 3 17 6 48 6 69 l0 39 110 -7 c81 -4 110 -3 110
                    6 0 6 -72 92 -160 190 l-159 179 -123 6 c-233 11 -359 12 -364 4z"/>
                    <path d="M2544 2668 c-33 -35 -204 -356 -204 -383 0 -8 7 -18 16 -22 21 -8
                    349 160 392 201 l32 31 -103 103 -103 102 -30 -32z"/>
                    <path d="M1280 2525 l0 -65 -46 0 c-58 0 -111 -25 -129 -61 -22 -42 -22 -1006
                    0 -1048 31 -62 34 -62 574 -59 479 3 490 3 518 24 53 40 53 32 53 565 0 488 0
                    497 -21 523 -29 37 -71 56 -124 56 l-45 0 0 65 0 65 -65 0 -65 0 0 -65 0 -65
                    -260 0 -260 0 0 65 0 65 -65 0 -65 0 0 -65z m840 -750 l0 -355 -455 0 -455 0
                    0 355 0 355 455 0 455 0 0 -355z"/>
                    <path d="M1730 1845 l-155 -155 -67 67 -68 68 -35 -35 -35 -35 103 -103 102
                    -102 195 195 195 195 -35 29 c-19 17 -37 30 -40 31 -3 0 -75 -70 -160 -155z"/>
                    <path d="M3330 1519 c-371 -270 -675 -497 -674 -503 2 -17 184 -266 195 -266
                    17 0 1359 982 1358 993 0 15 -181 259 -194 264 -5 1 -314 -218 -685 -488z
                    m751 374 c34 -49 73 -102 86 -119 l23 -31 -652 -474 c-358 -261 -659 -480
                    -669 -486 -15 -11 -27 1 -105 109 l-88 121 29 25 29 24 20 -25 c12 -13 34 -42
                    50 -63 46 -59 43 -22 -3 40 -23 30 -41 57 -41 60 0 3 13 14 30 26 l30 21 25
                    -28 c27 -31 36 -13 10 23 -13 19 -12 23 15 42 16 12 33 22 38 22 5 0 28 -27
                    51 -60 23 -33 47 -58 52 -54 5 3 -11 35 -37 71 -49 69 -49 67 0 95 17 9 23 7
                    34 -11 8 -11 21 -21 29 -21 11 0 11 6 -4 31 l-18 31 29 23 29 23 51 -66 c27
                    -36 52 -60 54 -54 2 7 -15 37 -37 67 -23 30 -41 58 -41 62 0 4 12 17 28 29
                    l27 22 22 -26 c26 -33 42 -22 19 14 -17 24 -17 26 1 40 48 38 50 38 95 -26 40
                    -57 58 -73 58 -50 0 6 -19 36 -42 67 l-42 55 29 24 c37 30 39 30 55 -1 14 -25
                    30 -33 30 -15 0 6 -7 21 -15 34 -15 23 -15 25 14 45 16 12 33 21 38 21 5 0 29
                    -27 53 -60 24 -32 47 -57 52 -54 10 6 6 13 -45 81 l-39 53 23 20 c31 25 46 25
                    61 0 13 -20 38 -28 38 -11 0 5 -7 14 -15 21 -8 7 -15 18 -15 26 0 17 60 59 69
                    48 4 -5 24 -33 45 -61 33 -46 56 -66 56 -47 0 3 -20 34 -45 68 l-44 63 30 23
                    31 22 23 -28 c28 -34 45 -26 21 10 -22 34 -21 39 14 59 l29 18 43 -60 c24 -33
                    46 -61 51 -61 16 0 5 23 -34 76 -43 58 -42 71 3 95 14 8 23 4 43 -18 27 -31
                    34 -16 10 21 -15 22 -14 25 19 50 l34 26 47 -65 c25 -36 51 -63 56 -60 5 4
                    -12 35 -37 71 l-46 64 24 20 c12 11 28 19 34 20 7 0 40 -39 75 -87z"/>
                    <path d="M2727 1801 l-27 -6 40 -57 41 -57 55 6 c61 7 60 8 37 -54 -3 -7 -1
                    -13 4 -13 6 0 18 18 28 40 l18 39 -42 56 c-39 52 -44 55 -84 54 -23 -1 -54 -4
                    -70 -8z"/>
                    <path d="M3094 1705 c-48 -38 -54 -46 -38 -51 10 -4 41 -15 67 -26 l48 -18 47
                    36 47 36 5 -38 c3 -21 10 -39 17 -41 9 -3 10 7 6 34 -9 58 -17 67 -82 90 l-60
                    22 -57 -44z"/>
                    <path d="M2432 1589 c-29 -22 -52 -43 -52 -47 0 -5 28 -18 62 -30 67 -24 60
                    -26 131 28 l27 22 0 -25 c0 -32 9 -57 21 -57 12 0 0 82 -15 96 -6 7 -36 21
                    -67 32 l-55 20 -52 -39z"/>
                    <path d="M2707 1464 c-3 -4 11 -31 31 -60 l37 -54 58 2 c51 3 57 1 53 -14 -4
                    -10 -9 -27 -12 -38 -12 -38 14 -20 30 21 17 41 17 42 -9 78 -52 74 -48 71
                    -117 71 -36 0 -67 -3 -71 -6z"/>
                    </g></svg>
                    TruPen
                </div>
                <div class="header-menu">
                </div>

                <div class="user-settings">
                    <div class="dark-light">
                    <svg viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" /></svg>
                </div>
            </div>
        </div>

        <div class="wrapper">
            <div class="searched-jobs">
                <div class="searched-bar">
                    <div class="searched-show"><img src="Image_Components\IITDH_logo.png" height="30" width="30"> IITdh Institute Portal</img> </div>
                </div>
                <div class="job-cards">
                    <div class="job-card">
                        <div class="job-card-header">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="-70 -60 512 512"  style="background-color:#eaeaea">
                                <g transform="translate(0.000000,388.000000) scale(0.130000,-0.120000)" fill="#000000" stroke="none">
                                    <path d="M1445 3839 c-27 -9 -701 -168 -1212 -286 -112 -26 -203 -51 -203 -54
                                    0 -4 57 -21 126 -38 l126 -30 37 19 c32 17 99 23 624 51 516 28 590 30 603 17
                                    19 -19 8 -47 -20 -53 -11 -2 -232 -15 -491 -30 -259 -14 -499 -28 -535 -32
                                    l-65 -6 70 -17 c39 -10 178 -43 310 -74 132 -31 344 -81 471 -111 126 -30 239
                                    -52 250 -50 10 3 327 77 704 166 814 190 770 179 770 189 0 4 -15 10 -32 13
                                    -18 3 -204 46 -413 96 -1120 264 -1053 250 -1120 230z"/>
                                    <path d="M1310 3503 c-25 -2 -254 -17 -509 -32 -416 -26 -466 -31 -478 -47
                                    -10 -14 -13 -88 -13 -333 l0 -315 -31 -25 c-24 -20 -32 -37 -36 -72 -4 -38 -1
                                    -50 22 -77 66 -78 173 -6 145 98 -8 28 -19 44 -40 55 l-30 16 0 319 0 320 22
                                    4 c13 3 259 19 548 36 569 33 620 37 620 51 0 9 -125 10 -220 2z"/>
                                    <path d="M520 3115 c0 -220 4 -237 69 -308 l40 -43 -6 -70 c-7 -90 12 -312 39
                                    -433 36 -168 103 -334 187 -461 53 -81 175 -205 250 -254 267 -174 609 -166
                                    863 22 251 186 415 535 446 947 5 66 7 155 4 198 -4 73 -3 80 21 105 54 58 57
                                    75 57 293 l0 201 -22 -6 c-13 -3 -234 -56 -493 -117 l-470 -110 -475 111
                                    c-261 61 -483 114 -492 116 -17 5 -18 -9 -18 -191z m375 -505 c378 -114 858
                                    -114 1242 0 56 16 107 30 113 30 19 0 -11 -259 -46 -390 -110 -418 -369 -670
                                    -689 -670 -356 0 -642 322 -714 805 -16 111 -25 255 -15 255 5 0 54 -14 109
                                    -30z"/>
                                    <path d="M250 2552 c0 -5 -9 -57 -20 -116 -26 -144 -24 -148 78 -144 l77 3 5
                                    45 5 45 7 -43 c3 -24 9 -47 13 -50 9 -10 25 20 24 48 0 50 -35 215 -44 213 -6
                                    -1 -24 -7 -41 -14 -25 -10 -36 -9 -64 4 -38 19 -40 20 -40 9z"/>
                                    <path d="M685 1538 c-37 -29 -77 -60 -87 -69 -21 -16 -10 -45 521 -1364 l36
                                    -90 364 0 364 0 287 717 288 717 -41 38 c-50 46 -131 103 -146 103 -6 0 -11
                                    -4 -11 -9 0 -16 -150 -170 -211 -217 -282 -216 -657 -242 -969 -67 -86 49
                                    -244 188 -291 258 -13 19 -27 35 -30 35 -3 0 -37 -24 -74 -52z"/>
                                    <path d="M423 1273 c-216 -298 -350 -705 -388 -1175 l-7 -88 496 0 496 0 -13
                                    33 c-8 17 -127 317 -267 665 -139 347 -256 632 -260 632 -5 0 -30 -30 -57 -67z"/>
                                    <path d="M2541 1318 c-5 -13 -122 -306 -261 -653 -139 -347 -255 -636 -257
                                    -642 -4 -10 98 -13 492 -13 l497 0 -7 67 c-49 516 -170 890 -382 1185 -31 43
                                    -60 78 -65 78 -5 0 -12 -10 -17 -22z"/>
                                    </g>
                            </svg>
                            <div class="menu-dot"></div>
                        </div>
                        <div class="job-card-title">Student Corner</div>
                        <div class="job-card-subtitle">
                            <p>
                                <font  face="Clear Sans Light">
                                    Student can connect to their institute for:
                                    <br><br>
                                    &nbsp - &nbsp examination<br>
                                    &nbsp - &nbsp test analyhsis <br>
                                    &nbsp - &nbsp results<br>
                                    &nbsp - &nbsp order printout<br>
                                    &nbsp - &nbsp assignments<br>
                                    &nbsp - &nbsp class notes<br>
                                    &nbsp - &nbsp interect with teachers<br>
                                    &nbsp - &nbsp ask doubts<br>
                                    &nbsp - &nbsp etc<br><br><br>
                                </font>
                            </p>
                        </div>
                        <div class="job-detail-buttons">
                            <button class="search-buttons detail-button">24X7</button>
                        </div>
                        <div class="job-card-buttons">
                            <button class="search-buttons card-buttons" onclick="location.href = 'stu_login.php'"><span>Login</span></button>
                            <button class="search-buttons card-buttons-msg" onclick="location.href = 'signup.php'"><span>Sign Up</span></button>
                        </div>
                    </div>

                    <div class="job-card">
                        <div class="job-card-header">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 520 520" style="background-color:#f76754">
                                <g transform="translate(0.000000,598.000000) scale(0.100000,-0.100000)" fill="#000000" stroke="none">
                                    <path d="M3579 5830 c-204 -24 -397 -119 -543 -268 -194 -198 -299 -454 -351
                                    -857 -4 -27 -8 -178 -10 -335 -3 -293 -11 -378 -46 -560 -56 -281 -176 -512
                                    -319 -614 l-55 -38 128 6 c89 5 127 4 122 -3 -3 -6 -10 -11 -15 -11 -21 0
                                    -185 -105 -253 -161 -186 -155 -322 -353 -398 -580 -27 -82 -59 -219 -59 -255
                                    0 -12 273 -14 1920 -14 1647 0 1920 2 1920 14 0 36 -32 173 -59 255 -106 315
                                    -333 578 -630 730 -53 27 -113 54 -134 61 -21 6 -37 14 -35 15 3 3 257 -34
                                    348 -51 l35 -6 -50 35 c-145 100 -261 317 -319 594 -39 190 -47 285 -51 590
                                    -3 309 -14 420 -61 613 -58 235 -150 414 -288 558 -160 167 -333 253 -566 282
                                    -93 11 -133 11 -231 0z m682 -925 c55 -116 50 -223 -13 -285 -17 -17 -29 -32
                                    -27 -34 2 -1 72 -11 154 -21 83 -10 156 -20 163 -22 16 -7 15 -66 -3 -210 -33
                                    -248 -109 -462 -231 -650 -21 -32 -81 -101 -133 -153 -149 -148 -292 -213
                                    -471 -213 -212 0 -403 105 -564 312 -136 174 -240 443 -271 701 l-7 56 174 37
                                    c96 20 229 55 296 77 233 77 539 232 777 394 61 41 114 75 118 75 4 1 22 -28
                                    38 -64z"/>
                                    <path d="M1265 4193 c-235 -31 -429 -212 -485 -452 -18 -76 -8 -231 18 -300
                                    l21 -54 -52 -71 c-192 -257 -308 -541 -353 -863 -20 -142 -15 -409 11 -547 9
                                    -48 15 -89 13 -90 -2 -2 -34 -11 -71 -20 -195 -52 -357 -256 -357 -452 0 -19
                                    36 -175 80 -348 44 -172 80 -327 80 -343 0 -16 9 -65 20 -108 49 -192 211
                                    -337 407 -365 40 -5 264 -10 503 -10 l430 1 5 27 c22 101 40 165 65 223 107
                                    253 333 435 600 483 19 4 696 6 1505 6 1430 0 1472 -1 1552 -20 253 -60 469
                                    -259 562 -516 16 -43 32 -99 36 -124 13 -89 -37 -80 448 -80 238 0 464 5 502
                                    10 224 32 396 215 421 445 4 33 42 201 85 373 44 172 79 328 79 347 0 105 -48
                                    220 -126 305 -66 70 -132 115 -217 144 l-62 21 -3099 3 c-1705 1 -3102 4
                                    -3104 7 -3 3 -14 42 -24 87 -25 108 -35 371 -19 493 27 202 96 403 201 577 85
                                    143 96 155 122 139 91 -57 269 -85 390 -62 81 16 191 69 260 125 71 58 142
                                    162 174 256 36 102 38 244 6 345 -84 270 -352 445 -627 408z"/>
                                    <path d="M2247 579 c-113 -18 -240 -105 -307 -209 -57 -89 -97 -247 -84 -330
                                    l7 -40 1837 0 1837 0 7 40 c8 49 -8 153 -34 227 -58 165 -206 289 -372 313
                                    -77 12 -2822 11 -2891 -1z"/>
                                </g>
                            </svg>
                            <div class="menu-dot"></div>
                        </div>
                        <div class="job-card-title">Professors Corner</div>
                        <div class="job-card-subtitle">
                            <p>
                                <font face="Clear Sans Light">
                                    Professors can:
                                    <br><br>
                                    &nbsp - &nbsp connect to students<br>
                                    &nbsp - &nbsp solve their query<br>
                                    &nbsp - &nbsp create a quiz<br>
                                    &nbsp - &nbsp check results<br>
                                    &nbsp - &nbsp send assignments<br>
                                    &nbsp - &nbsp upload class notes<br>
                                    &nbsp - &nbsp order printout<br>
                                    &nbsp - &nbsp give grades to students<br>
                                    &nbsp - &nbsp etc.<br><br><br>
                                </font>
                            </p>
                        </div>
                        <div class="job-detail-buttons">
                            <button class="search-buttons detail-button">24x7</button>
                        </div>
                        <div class="job-card-buttons">
                            <button class="search-buttons card-buttons" onclick="location.href = 'tea_login.php'"><span>Sign In</span></button>
                            <button class="search-buttons card-buttons-msg" onclick="location.href = 'tea_signup.php'"><span>Sign Up</span></button>
                        </div>
                    </div>

                    <div class="job-card">
                        <div class="job-card-header">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="10 0 512 512" fill="#fff" style="background-color:#55acee">
                                <g transform="translate(0.000000,512.000000) scale(0.0600000,-0.0600000)" fill="#000000" stroke="none">
                                    <path d="M2860 6950 l0 -1080 595 0 595 0 0 -105 0 -105 -636 0 c-427 0 -649
                                    4 -679 11 -53 13 -98 55 -113 107 -9 28 -12 186 -12 541 l0 501 -264 0 c-235
                                    0 -271 -2 -327 -20 -75 -23 -107 -43 -170 -105 -57 -56 -97 -134 -112 -219
                                    l-11 -66 -641 0 c-666 0 -719 -3 -803 -43 -70 -32 -154 -117 -193 -193 l-34
                                    -68 -3 -675 -3 -674 23 -26 23 -26 -23 19 -22 19 2 -1574 3 -1574 32 -65 c37
                                    -76 77 -122 150 -172 97 -67 114 -68 821 -68 345 0 646 0 670 0 l43 0 -98
                                    -117 c-228 -276 -497 -599 -511 -616 -13 -15 -14 -28 -4 -85 9 -56 48 -249 67
                                    -329 l5 -23 1498 0 c1185 0 1501 3 1511 13 11 9 13 9 7 0 -6 -10 41 -13 220
                                    -13 214 0 226 1 213 18 -13 16 -13 16 7 -1 19 -16 105 -17 1492 -17 l1472 0 5
                                    23 c19 80 58 273 67 329 10 57 9 70 -4 85 -8 10 -118 142 -243 293 -126 151
                                    -259 311 -296 355 -37 44 -66 81 -65 83 2 1 303 2 669 2 701 0 727 1 823 46
                                    66 31 157 127 192 201 l27 58 0 2256 0 2255 -34 67 c-60 117 -172 203 -296
                                    226 -38 7 -280 11 -700 11 l-641 0 -11 66 c-26 152 -125 268 -270 320 -65 23
                                    -79 24 -335 24 l-268 0 0 -510 c0 -555 1 -549 -56 -602 -16 -14 -47 -31 -69
                                    -37 -27 -7 -278 -11 -777 -11 l-738 0 0 105 0 105 613 1 c336 0 648 0 693 -1
                                    l81 -1 6 801 6 802 -43 42 c-38 37 -165 178 -372 414 -40 44 -74 79 -75 77 -2
                                    -2 -3 -121 -1 -264 l3 -261 219 0 220 0 0 -75 0 -75 -300 0 -300 0 0 350 0
                                    350 -1260 0 -1260 0 0 -1080z m1633 754 c-5 -13 23 -15 256 -12 l261 3 0 -97
                                    0 -98 -197 0 c-109 -1 -272 0 -362 0 -157 1 -165 0 -190 -22 l-26 -23 19 23
                                    19 22 -521 0 -522 0 0 95 c0 69 3 95 13 95 1162 1 1215 1 1233 15 24 18 25 18
                                    17 -1z m517 -544 c3 -36 3 -80 1 -97 l-3 -33 -597 0 c-464 0 -600 -3 -610 -12
                                    -11 -10 -13 -10 -7 0 6 9 -53 12 -278 12 l-286 0 0 93 c0 52 3 97 7 100 3 4
                                    403 6 887 4 l881 -2 5 -65z m0 -505 l0 -95 -862 -2 c-475 -2 -875 -2 -890 0
                                    l-28 3 0 94 0 94 153 3 c83 2 484 2 890 0 l737 -2 0 -95z m-2873 -875 c250
                                    -351 254 -357 317 -386 l51 -24 1930 1 c2081 0 1966 -3 2038 52 18 14 85 98
                                    148 186 165 234 196 276 267 374 l64 87 728 -2 c715 -3 729 -3 756 -23 15 -11
                                    35 -36 45 -55 18 -33 19 -80 19 -1012 l0 -978 -203 0 c-149 0 -207 -3 -216
                                    -13 -11 -9 -13 -9 -7 1 6 9 -38 12 -202 12 l-209 0 -6 51 c-13 104 -77 192
                                    -172 235 l-51 24 -1373 0 c-1103 1 -1376 -2 -1390 -12 -14 -11 -14 -11 -4 2
                                    10 13 -15 15 -212 15 l-224 0 27 -30 27 -30 -31 28 -31 27 -1388 0 -1388 0
                                    -52 -24 c-95 -43 -159 -131 -172 -235 l-6 -51 -201 -2 c-110 -2 -299 -2 -418
                                    0 l-218 3 0 207 c0 153 -3 212 -12 221 -10 11 -10 12 -1 7 10 -5 13 158 15
                                    768 3 761 3 775 23 802 11 15 36 35 55 46 33 17 70 18 754 16 l720 -3 203
                                    -285z m2443 -15 l0 -105 -240 0 -240 0 0 105 0 105 240 0 240 0 0 -105z
                                    m-1995 -2145 c1107 0 1404 3 1414 13 11 9 13 9 7 0 -6 -10 87 -13 449 -13 362
                                    0 455 3 449 13 -6 10 -4 10 7 0 10 -10 384 -13 1801 -13 l1788 0 0 -938 c0
                                    -893 -1 -939 -19 -972 -10 -19 -30 -44 -45 -55 -27 -20 -41 -20 -791 -23
                                    l-763 -2 -191 197 -191 198 292 5 c161 3 294 7 296 8 1 1 2 8 2 15 0 7 77 89
                                    170 182 94 93 170 175 170 182 0 7 -9 17 -19 23 -14 7 -951 9 -2982 8 -2795
                                    -3 -2962 -4 -2973 -20 -9 -15 15 -43 160 -190 94 -95 173 -180 176 -188 4 -13
                                    49 -16 297 -20 l293 -5 -192 -198 -192 -197 -763 2 c-750 3 -764 3 -791 23
                                    -15 11 -35 36 -45 55 -18 33 -19 79 -19 972 l0 938 396 0 c313 0 394 3 388 13
                                    -6 10 -4 10 7 0 10 -10 307 -13 1414 -13z m3520 -1455 c23 -33 133 -197 246
                                    -365 113 -168 253 -375 311 -460 279 -413 420 -624 425 -636 4 -12 -172 -14
                                    -1137 -14 -851 0 -1146 -3 -1157 -11 -10 -9 -12 -9 -8 2 4 12 -45 14 -317 12
                                    -178 -2 -325 -3 -327 -3 -3 0 6 -12 20 -27 l24 -28 -31 28 -30 27 -1162 0
                                    c-638 0 -1163 4 -1166 8 -5 8 63 111 389 592 76 113 235 349 353 525 244 362
                                    251 373 271 398 13 16 101 17 1635 15 l1620 -3 41 -60z"/>
                                    <path d="M893 5730 c-52 -11 -100 -35 -136 -69 -113 -104 -50 -250 128 -296
                                    74 -19 451 -21 540 -3 67 13 140 58 173 108 19 28 23 45 20 86 -7 78 -56 129
                                    -161 165 -45 16 -86 18 -287 18 -129 -1 -254 -5 -277 -9z"/>
                                    <path d="M7850 3259 c-135 -57 -180 -231 -88 -343 85 -103 222 -110 318 -17
                                    75 73 90 158 43 252 -40 78 -94 113 -181 116 -37 2 -78 -2 -92 -8z"/>
                                    <path d="M7834 2575 c-85 -43 -134 -137 -118 -230 9 -55 26 -86 73 -128 105
                                    -95 269 -64 334 62 18 36 27 70 27 101 0 71 -43 148 -103 184 -69 43 -144 46
                                    -213 11z"/>
                                </g>
                            </svg>
                            <div class="menu-dot"></div>
                        </div>
                        <div class="job-card-title">Print Office</div>
                        <div class="job-card-subtitle">
                            <p>
                                <font face="Clear Sans Light">
                                    Print office:
                                    <br><br>
                                    &nbsp - &nbsp will get request<br>
                                    &nbsp - &nbsp may accept request<br>
                                    &nbsp - &nbsp may deny with suitable reason<br>
                                    &nbsp - &nbsp can automate printing<br>
                                    &nbsp - &nbsp easy to handle<br>
                                    &nbsp - &nbsp user friendly<br>
                                    &nbsp - &nbsp connects with multiple users<br>
                                    &nbsp - &nbsp can reply app. time to request<br>
                                    &nbsp - &nbsp to recive the print outs<br><br><br>
                            </p>
                        </div>
                        <div class="job-detail-buttons">
                            <button class="search-buttons detail-button">Powerful Tool</button>
                        </div>
                        <div class="job-card-buttons">
                            <button class="search-buttons card-buttons"><span> Sign In</span> </button>
                            <button class="search-buttons card-buttons-msg"><span> Sign Up </span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src='Design_Components/jquery.min.js'></script>
        
        <script id="rendered-js" >

            const wrapper = document.querySelector(".wrapper");
            const header = document.querySelector(".header");

            wrapper.addEventListener("scroll", e => {
            e.target.scrollTop > 30 ?
            header.classList.add("header-shadow") :
            header.classList.remove("header-shadow");
            });

            const toggleButton = document.querySelector(".dark-light");

            toggleButton.addEventListener("click", () => {
            document.body.classList.toggle("dark-mode");
            });

            const jobCards = document.querySelectorAll(".job-card");
            const logo = document.querySelector(".logo");
            const jobLogos = document.querySelector(".job-logos");
            const jobDetailTitle = document.querySelector(
            ".job-explain-content .job-card-title");

            const jobBg = document.querySelector(".job-bg");

            jobCards.forEach(jobCard => {
            jobCard.addEventListener("click", () => {
            const number = Math.floor(Math.random() * 10);
            //const url = `https://unsplash.it/640/425?image=${number}`;
            jobBg.src = url;

            const logo = jobCard.querySelector("svg");
            const bg = logo.style.backgroundColor;
            console.log(bg);
            jobBg.style.background = bg;
            const title = jobCard.querySelector(".job-card-title");
            jobDetailTitle.textContent = title.textContent;
            jobLogos.innerHTML = logo.outerHTML;
            wrapper.classList.add("detail-page");
            wrapper.scrollTop = 0;
            });
            });

            logo.addEventListener("click", () => {
            wrapper.classList.remove("detail-page");
            wrapper.scrollTop = 0;
            jobBg.style.background = bg;
            });
        </script>

    </body>
</html>
