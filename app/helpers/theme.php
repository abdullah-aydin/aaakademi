<?php 
$themeIndex=0;
$theme_color = [
    'primary',
    'success',
    'warning',
    'info',
    'danger',
    'secondary',
    'primary',
    'success',
    'warning',
    'info',
    'danger',
    'secondary',
];

function percent_progresbar_color($percent){
   if($percent>=100){
       return 'green';
   }elseif($percent >= 50){
        return 'yellow';
   }elseif($percent >= 0){
        return 'red';
   }
}
