<?php
/**
 * Classe de Calendário desenvolvida para CakePHP e adaptadada para o WP5
 *
 * @author Fellipe Nathan
 */
class Calendar{
    
function getCalendar( $month = null , $year = null ){

        if(!$month){
            $month = date('n');
        }
        if(!$year){
            $year = date('Y');
        }
        /*
         * pega timestamp Unix do primeiro dia do mês
         */
        $firstDay = mktime(0,0,0,$month,1,$year);
        /*
         * pega quantos dias tem no mês
         */
        $monthDays = date('t',$firstDay);
        /*
         * pega qual dia da semana que é o primeiro
         */
        $firstDayWeek = date('w',$firstDay);
        /*
         * preenche o array com null até o dia que começa
         */
        if($firstDayWeek>0){
            $calendar = array(
                'weeks' => array(
                    0 => array_fill(0,$firstDayWeek,NULL)
                )
            );
        }

        $week = 0;

        $day = 1;

        $dayWeek = $firstDayWeek;

        /*
         * while para preencher o calendario separando por semanas
         */
        while($day <= $monthDays){

            if($dayWeek >= 7){
                $dayWeek = 0;
                $week++;
            }

            $calendar['weeks'][$week][$dayWeek]["day"] = $day;

            if($day<$monthDays){
                $dayWeek++;
            }
                $day++;

        }

        /*
         * preenche o final do array com null para fechar todos os espaços
         */
       $calendar['weeks'][$week] += array_fill($dayWeek,7-$dayWeek,NULL);
       
        /*
         * pega o nome do mês na função _monthName
         */
        $calendar['monthNum'] = $month;
        $calendar['month'] = self::_monthName($month);
        $calendar['year'] = $year;
        $calendar["nextMonth"] = self::_nextMonth($month);
        $calendar["prevMonth"] = self::_prevMonth($month);
        $calendar["nextYear"] = self::_nextYear($month,$year);
        $calendar["prevYear"] = self::_prevYear($month,$year);
        $calendar['daysWeekName'] = self::_dayWeeksName();

        return $calendar;
    }
    
    function getYearCalendar($year){
        
        $calendarYear = array();
        
        for($i=1;$i<=12;$i++){
            
           $calendarYear[$i] = self::getCalendar($i,$year); 
            
        }
        
        return $calendarYear;
        
    }

    function _monthName($month){

        $months = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );

        return $months[$month];
    }

    function _dayWeeksName(){

        $daysName = array(
            'Dom' => 'Domingo',
            'Seg' => 'Segunda',
            'Ter' => 'Terça',
            'Qua' => 'Quarta',
            'Qui' => 'Quinta',
            'Sex' => 'Sexta',
            'Sab' => 'Sábado'
        );

        return $daysName;
    }

    function _nextMonth($month){

        if($month==12){
            return 1;
        }else{
            return $month+1;
        }
    }

    function _prevMonth($month){

        if($month==1){
            return 12;
        }else{
            return $month-1;
        }
    }

    function _nextYear($month,$year){

        if($month==12){
            return $year+1;
        }else{
            return $year;
        }
    }

    function _prevYear($month,$year){

        if($month==1){
            return $year-1;
        }else{
            return $year;
        }
    }
}
?>