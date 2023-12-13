<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\CalendarEvents;
use Carbon\Carbon;
class CalenderEventsController extends Controller
{
    public function index(Request $request)
    {

        $date = empty($date) ?Carbon::now() : Carbon::createFromDate($date);
        $startOfCalendar = $date->copy()->firstOfMonth()->startOfWeek(Carbon::SUNDAY);
        $endOfCalendar = $date->copy()->lastOfMonth()->endOfWeek(Carbon::SATURDAY);
        $previousMonth = $date->copy()->firstOfMonth()->subMonth();
        $nextMonth = $date->copy()->firstOfMonth()->addMonth();




        $html = '<div class="calendar">';

        $html .= '<div class="month-year">';
        $html .= '<span class="month">' . $date->format('M') . '</span>';
        $html .= '<span class="year">' . $date->format('Y') . '</span>';
        $html .= '</div>';

        $html .= '<div class="days">';

        $dayLabels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
        foreach ($dayLabels as $dayLabel)
        {
            $html .= '<span class="day-label">' . $dayLabel . '</span>';
        }
        $html .= '</div>';
        $html .= '<div class="days">';

        $get_events = CalendarEvents::where("event_date", ">=", date("Y-m-d", strtotime($startOfCalendar)))->get();

        while ($startOfCalendar <= $endOfCalendar)
        {
            $extraClass = $startOfCalendar->format('m') != $date->format('m') ? 'dull' : '';
            $extraClass .= $startOfCalendar->isToday() ? ' today' : '';

            $startOfCalendarFormated = $startOfCalendar->format('j');
            $startOfCalendarSqlFormat = $startOfCalendar->format('Y-m-d');

            $html .= '<span class="day ' . $extraClass . '"><span class="content">';

            $filled = false;
            foreach ($get_events as $events) {
                if ($events->event_date == $startOfCalendarSqlFormat) {
                    $html .= '<div class="flip-card">';
                    $html .= '<div class="flip-card-inner">';
                    $html .= '<div class="flip-card-front">';
                    $html .=  $startOfCalendarFormated;
                    $html .=  ' </div>';
                    $html .=   '<div class="flip-card-back">';
                    $html .=   '<img src="'.$events->image.'">';
                    $html .=  '</div>';
                    $html .=  '</div>';
                    $html .=  '</div>';
                    $filled = true;
                }
            }

            if(!$filled){
                $html .= $startOfCalendarFormated;
            }

            $html .= '</span></span>';

            $startOfCalendar->addDay();
        }
        $html .= '</div></div>';
            return view('calendar', ['calendar' => $html, 'prevMonth'=>$previousMonth, 'nextMonth'=>$nextMonth]);
    }

}
