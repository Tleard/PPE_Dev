<?php

include '../vendor/autoload.php';


$pdf = new Cezpdf('a4','portrait','color',array(0.8,0.8,0.8));

$pdf->ezSetMargins(20,20,20,20);

$mainFont = 'Times-Roman';

$pdf->selectFont($mainFont);

$size=12;

$pdf->openHere('Fit');


$pdf->ezText("PDF with some <c:color:1,0,0>blue</c:color> <c:color:0,1,0>red</c:color> and <c:color:0,0,1>green</c:color> colours", $size, array('justification'=>'right'));

$pdf->ezStream(array('compress'=>0));
