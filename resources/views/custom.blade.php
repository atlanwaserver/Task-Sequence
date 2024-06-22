<!DOCTYPE html>
<html>
<head>
    <title>Task Sequencing</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
        }

        h1 {
            text-align: center;
            color: #343a40;
        }

        .sidebar {
            width: 200px;
            background-color: #343a40;
            padding: 20px;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            height:100vh;
            box-sizing: border-box;
        }

        .main-content {
            flex-grow: 1;
            padding: 20px;
        }

        table {
            border-collapse: collapse;
            margin: 20px auto;
            background-color: #fff;
            border: 2px solid #dee2e6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
            min-width: 100px; /* Ensures a minimum width for better drag-and-drop visibility */
        }

        th {
            background-color: #f2f2f2;
            color: #343a40;
        }

        .highlight {
            background-color: #f8f9fa;
        }

        .special {
            background-color: #f0f0f0;
        }

        .list-container {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .subject, .day {
            padding: 10px 20px;
            margin: 5px;
            background-color: #343a40;
            color: white;
            cursor: pointer;
            text-align: center;
        }

        .droppable {
            min-height: 40px;
            vertical-align: middle;
        }

        .day-cell {
            cursor: pointer;
        }

        .drag-container {
            margin-bottom: 20px; /* Added margin bottom for spacing */
        }
    </style>
    <style type="text/css">
        html { font-family:Calibri, Arial, Helvetica, sans-serif; font-size:11pt; background-color:white }
        a.comment-indicator:hover + div.comment { background:#ffd; position:absolute; display:block; border:1px solid black; padding:0.5em }
        a.comment-indicator { background:red; display:inline-block; border:1px solid black; width:0.5em; height:0.5em }
        div.comment { display:none }
        table { border-collapse:collapse; page-break-after:always }
        .gridlines td { border:1px dotted black }
        .gridlines th { border:1px dotted black }
        .b { text-align:center }
        .e { text-align:center }
        .f { text-align:right }
        .inlineStr { text-align:left }
        .n { text-align:right }
        .s { text-align:left }
        td.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style0 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style1 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style1 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style2 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style2 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style3 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#00B050 }
        th.style3 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#00B050 }
        td.style4 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style4 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style5 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FF2121 }
        th.style5 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FF2121 }
        td.style6 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style6 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style7 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style7 { vertical-align:bottom; text-align:right; padding-right:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style8 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style8 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style9 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style10 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style10 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style11 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style11 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style12 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style12 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style13 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style13 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style14 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#00B050 }
        th.style14 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#00B050 }
        td.style15 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FF2121 }
        th.style15 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:#FF2121 }
        td.style16 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style16 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style17 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style17 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style18 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style18 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style19 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style19 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style20 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style20 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style21 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style21 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style22 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style22 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style23 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style23 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style24 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style24 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style25 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style25 { vertical-align:middle; text-align:center; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style26 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style26 { vertical-align:bottom; text-align:left; padding-left:0px; border-bottom:none #000000; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style27 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style27 { vertical-align:bottom; border-bottom:none #000000; border-top:none #000000; border-left:2px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style28 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style28 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style29 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style29 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style30 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style30 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style31 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style31 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style32 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style32 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style33 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style33 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:2px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style34 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style34 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style35 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style35 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style36 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style36 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style37 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style37 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style38 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style38 { vertical-align:bottom; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style39 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style39 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:none #000000; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style40 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style40 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style41 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style41 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style42 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style42 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style43 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style43 { vertical-align:middle; text-align:center; border-bottom:1px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style44 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style44 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:none #000000; border-right:1px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style45 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style45 { vertical-align:bottom; text-align:center; border-bottom:2px solid #000000 !important; border-top:1px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style46 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style46 { vertical-align:bottom; border-bottom:2px solid #000000 !important; border-top:none #000000; border-left:2px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        td.style47 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        th.style47 { vertical-align:bottom; border-bottom:1px solid #000000 !important; border-top:2px solid #000000 !important; border-left:1px solid #000000 !important; border-right:2px solid #000000 !important; color:#000000; font-family:'Calibri'; font-size:11pt; background-color:white }
        table.sheet0 col.col0 { width:41.34444397pt }
        table.sheet0 col.col1 { width:54.2222216pt }
        table.sheet0 col.col2 { width:46.08888836pt }
        table.sheet0 col.col3 { width:42pt }
        table.sheet0 col.col4 { width:42pt }
        table.sheet0 col.col5 { width:42pt }
        table.sheet0 col.col6 { width:42pt }
        table.sheet0 col.col7 { width:42pt }
        table.sheet0 col.col8 { width:42pt }
        table.sheet0 col.col9 { width:43.37777728pt }
        table.sheet0 col.col10 { width:42pt }
        table.sheet0 col.col11 { width:42pt }
        table.sheet0 tr { height:15pt }
        table.sheet0 tr.row3 { height:15.75pt }
        table.sheet0 tr.row5 { height:15.75pt }
        table.sheet0 tr.row6 { height:15.75pt }
        table.sheet0 tr.row18 { height:15.75pt }
    </style>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            // Make subjects draggable
            $(".subject").draggable({
                helper: "clone"
            });

            // Make timetable cells droppable for subjects
            $(".droppable").droppable({
                accept: ".subject",
                drop: function(event, ui) {
                    var droppedItem = ui.helper.clone();
                    $(this).empty().append(droppedItem);
                }
            });

            // Make days draggable
            $(".day").draggable({
                helper: "clone"
            });

            // Make timetable cells droppable for days
            $(".day-cell").droppable({
                accept: ".day",
                drop: function(event, ui) {
                    var droppedItem = ui.helper.clone();
                    $(this).empty().append(droppedItem);
                }
            });
        });
    </script>
</head>
<body>
    <div class="sidebar">
        <h2>Users</h2>
        <div class="day">User1</div>
        <div class="day">User2</div>
        <div class="day">User3</div>
        <div class="day">User4</div>
        <div class="day">User5</div>
        <div class="day">User6</div>
    </div>
    <div class="main-content">
        <h1>TASK SEQUENCING</h1>

        <!-- Subject List for Dragging -->
        <div class="list-container">
            <div class="subject">Task 1</div>
            <div class="subject">Task 2</div>
            <div class="subject">Task 3</div>
            <div class="subject">Task 4</div>
            <div class="subject">Task 5</div>
            <div class="subject">Task 6</div>
            <div class="subject">Task 7</div>
            <div class="subject">Task 8</div>
        </div>

        <!-- Timetable -->
        <table border="0" cellpadding="0" cellspacing="0" id="sheet0" class="sheet0 gridlines">
        <col class="col0">
        <col class="col1">
        <col class="col2">
        <col class="col3">
        <col class="col4">
        <col class="col5">
        <col class="col6">
        <col class="col7">
        <col class="col8">
        <col class="col9">
        <col class="col10">
        <col class="col11">
        <tbody>
          <tr class="row0">
            <td class="column0 style9 s style25" rowspan="4">APSYS</td>
            <td class="column1 style10 s style10" colspan="2">TASK SEQUENCE</td>
            <td class="column3 style10 s style10" colspan="7">TC1 &amp; TC2</td>
            <td class="column10 style11 null style12" colspan="2"></td>
          </tr>
          <tr class="row1">
            <td class="column1 style2 s style2" colspan="2">STATION</td>
            <td class="column3 style2 s style2" colspan="7">C325</td>
            <td class="column10 style3 s style14" colspan="2">COMPLETED</td>
          </tr>
          <tr class="row2">
            <td class="column1 style2 s style2" colspan="2">TAKT TIME</td>
            <td class="column3 style4 n style4" colspan="7">36</td>
            <td class="column10 style5 s style15" colspan="2">FAILED</td>
          </tr>
          <tr class="row3">
            <td class="column1 style8 s style8" colspan="2">METHOD TIME</td>
            <td class="column3 style7 n style7" colspan="7">185</td>
            <td class="column10 style8 s style26" colspan="2">BLANK</td>
          </tr>
          <tr class="row4">
            <td class="column0 style30 s style12" colspan="2">TIME</td>
            <td class="column2 style38 n">8</td>
            <td class="column3 style31 n">9</td>
            <td class="column4 style31 n">10</td>
            <td class="column5 style31 n">11</td>
            <td class="column6 style31 n">12</td>
            <td class="column7 style31 n">1</td>
            <td class="column8 style31 n">2</td>
            <td class="column9 style31 n">3</td>
            <td class="column10 style31 n">4</td>
            <td class="column11 style32 n">5</td>
          </tr>
          <tr class="row5">
            <td class="column0 style33 s style45" colspan="2">MINS</td>
            <td class="column2 style39 n style35" colspan="2">120</td>
            <td class="column4 style36 n">7</td>
            <td class="column5 style36 n">128</td>
            <td class="column6 style36 n">30</td>
            <td class="column7 style34 n style35" colspan="2">165</td>
            <td class="column9 style36 n">7</td>
            <td class="column10 style34 n style37" colspan="2">128</td>
          </tr>
          <tr class="row6">
            <td class="column0 style27 s">STARTING</td>
            <td class="column1 style46 null"></td>
            <td class="column2 style40 s style29" colspan="10">DAY 1 / MORNING SHIFT</td>
          </tr>
          <tr class="row7">
            <td class="column0 style16 s">OPERATOR 1</td>
            <td class="column1 style18 null"></td>
            <td class="column2 style43 n">1</td>
            <td class="column3 style6 n">2</td>
            <td class="column4 style6 n">3</td>
            <td class="column5 style6 n">4</td>
            <td class="column6 style6 n">5</td>
            <td class="column7 style6 n">6</td>
            <td class="column8 style6 n">7</td>
            <td class="column9 style6 n">8</td>
            <td class="column10 style6 n">9</td>
            <td class="column11 style17 n">10</td>
          </tr>
          <tr class="row8">
            <td class="column0 style19 s">NAME</td>
            <td class="column1 style21 null day-cell"></td>
            <td class="droppable column2 style44 null"></td>
            <td class="droppable column3 style20 null"></td>
            <td class="droppable column4 style20 null"></td>
            <td class="droppable column5 style20 null"></td>
            <td class="droppable column6 style20 null"></td>
            <td class="droppable column7 style20 null"></td>
            <td class="droppable column8 style20 null"></td>
            <td class="droppable column9 style20 null"></td>
            <td class="droppable column10 style20 null"></td>
            <td class="droppable column11 style21 null"></td>
          </tr>
          <tr class="row9">
            <td class="column0 style16 s">OPERATOR 2</td>
            <td class="column1 style18 null"></td>
            <td class="column2 style43 n">1</td>
            <td class="column3 style6 n">2</td>
            <td class="column4 style6 n">3</td>
            <td class="column5 style6 n">4</td>
            <td class="column6 style6 n">5</td>
            <td class="column7 style6 n">6</td>
            <td class="column8 style6 n">7</td>
            <td class="column9 style6 n">8</td>
            <td class="column10 style6 n">9</td>
            <td class="column11 style17 n">10</td>
          </tr>
          <tr class="row10">
            <td class="column0 style19 s">NAME</td>
            <td class="column1 style21 null day-cell"></td>
            <td class="droppable column2 style44 null"></td>
            <td class="droppable column3 style20 null"></td>
            <td class="droppable column4 style20 null"></td>
            <td class="droppable column5 style20 null"></td>
            <td class="droppable column6 style20 null"></td>
            <td class="droppable column7 style20 null"></td>
            <td class="droppable column8 style20 null"></td>
            <td class="droppable column9 style20 null"></td>
            <td class="droppable column10 style20 null"></td>
            <td class="droppable column11 style21 null"></td>
          </tr>
          <tr class="row11">
            <td class="column0 style16 s">OPERATOR 3</td>
            <td class="column1 style18 null"></td>
            <td class="column2 style43 n">1</td>
            <td class="column3 style6 n">2</td>
            <td class="column4 style6 n">3</td>
            <td class="column5 style6 n">4</td>
            <td class="column6 style6 n">5</td>
            <td class="column7 style6 n">6</td>
            <td class="column8 style6 n">7</td>
            <td class="column9 style6 n">8</td>
            <td class="column10 style6 n">9</td>
            <td class="column11 style17 n">10</td>
          </tr>
          <tr class="row12">
            <td class="column0 style19 s">NAME</td>
            <td class="column1 style21 null day-cell"></td>
            <td class="droppable column2 style44 null"></td>
            <td class="droppable column3 style20 null"></td>
            <td class="droppable column4 style20 null"></td>
            <td class="droppable column5 style20 null"></td>
            <td class="droppable column6 style20 null"></td>
            <td class="droppable column7 style20 null"></td>
            <td class="droppable column8 style20 null"></td>
            <td class="droppable column9 style20 null"></td>
            <td class="droppable column10 style20 null"></td>
            <td class="droppable column11 style21 null"></td>
          </tr>
          <tr class="row13">
            <td class="column0 style16 s">OPERATOR 4</td>
            <td class="column1 style18 null"></td>
            <td class="column2 style43 n">1</td>
            <td class="column3 style6 n">2</td>
            <td class="column4 style6 n">3</td>
            <td class="column5 style6 n">4</td>
            <td class="column6 style6 n">5</td>
            <td class="column7 style6 n">6</td>
            <td class="column8 style6 n">7</td>
            <td class="column9 style6 n">8</td>
            <td class="column10 style6 n">9</td>
            <td class="column11 style17 n">10</td>
          </tr>
          <tr class="row14">
            <td class="column0 style19 s">NAME</td>
            <td class="column1 style21 null day-cell"></td>
            <td class="droppable column2 style44 null"></td>
            <td class="droppable column3 style20 null"></td>
            <td class="droppable column4 style20 null"></td>
            <td class="droppable column5 style20 null"></td>
            <td class="droppable column6 style20 null"></td>
            <td class="droppable column7 style20 null"></td>
            <td class="droppable column8 style20 null"></td>
            <td class="droppable column9 style20 null"></td>
            <td class="droppable column10 style20 null"></td>
            <td class="droppable column11 style21 null"></td>
          </tr>
          <tr class="row15">
            <td class="column0 style16 s">OPERATOR 5</td>
            <td class="column1 style18 null"></td>
            <td class="column2 style43 n">1</td>
            <td class="column3 style6 n">2</td>
            <td class="column4 style6 n">3</td>
            <td class="column5 style6 n">4</td>
            <td class="column6 style6 n">5</td>
            <td class="column7 style6 n">6</td>
            <td class="column8 style6 n">7</td>
            <td class="column9 style6 n">8</td>
            <td class="column10 style6 n">9</td>
            <td class="column11 style17 n">10</td>
          </tr>
          <tr class="row16">
            <td class="column0 style19 s">NAME</td>
            <td class="column1 style21 null day-cell"></td>
            <td class="droppable column2 style44 null"></td>
            <td class="droppable column3 style20 null"></td>
            <td class="droppable column4 style20 null"></td>
            <td class="droppable column5 style20 null"></td>
            <td class="droppable column6 style20 null"></td>
            <td class="droppable column7 style20 null"></td>
            <td class="droppable column8 style20 null"></td>
            <td class="droppable column9 style20 null"></td>
            <td class="droppable column10 style20 null"></td>
            <td class="droppable column11 style21 null"></td>
          </tr>
          <tr class="row17">
            <td class="column0 style16 s">OPERATOR 6</td>
            <td class="column1 style18 null"></td>
            <td class="column2 style43 n">1</td>
            <td class="column3 style6 n">2</td>
            <td class="column4 style6 n">3</td>
            <td class="column5 style6 n">4</td>
            <td class="column6 style6 n">5</td>
            <td class="column7 style6 n">6</td>
            <td class="column8 style6 n">7</td>
            <td class="column9 style6 n">8</td>
            <td class="column10 style6 n">9</td>
            <td class="column11 style17 n">10</td>
          </tr>
          <tr class="row18">
            <td class="column0 style19 s">NAME</td>
            <td class="column1 style21 null day-cell"></td>
            <td class="droppable column2 style44 null"></td>
            <td class="droppable column3 style20 null"></td>
            <td class="droppable column4 style20 null"></td>
            <td class="droppable column5 style20 null"></td>
            <td class="droppable column6 style20 null"></td>
            <td class="droppable column7 style20 null"></td>
            <td class="droppable column8 style20 null"></td>
            <td class="droppable column9 style20 null"></td>
            <td class="droppable column10 style20 null"></td>
            <td class="droppable column11 style21 null"></td>
          </tr>
        </tbody>
    </table>
    </div>
</body>
</html>
