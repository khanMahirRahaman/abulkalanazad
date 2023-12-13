<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CalendarEvents;
use Illuminate\Support\Str;


class EventCalendarController extends Controller
{
    public function index()
    {
        $calendar_events = CalendarEvents::orderBy('id', 'desc')->get();

        return view('admin.calendar_event.index', compact('calendar_events'));
    }

    public function create()
    {
        return view('admin.calendar_event._create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            "event_name" => "required",
            "event_date" => "required"
        ]);

        $calendarEvent = new CalendarEvents();

        $image = $request->file('image');

        if ($image) {
            // dd($image);
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/calendar', $imgName);
            $calendarEvent->image = $imgName;
        } else {
            $calendarEvent->image = 'Null';
        }

        $calendarEvent->event_name = $request->event_name;
        $calendarEvent->event_date = date("Y-m-d", strtotime(str_replace('/', '-', $request->event_date)));
        $calendarEvent->event_desc = $request->event_desc;
        $calendarEvent->save();

        return redirect()->route('calendar.event.index')->withSuccess(__('notification.saved_successfully'));
    }

    public function edit($calendar_event_id)
    {
        $calendar_event = CalendarEvents::where('id', $calendar_event_id)->first();

        return view('admin.calendar_event.edit', compact('calendar_event'));
    }

    public function update(Request $request, $calendar_event_id)
    {
        $this->validate($request, [
            "event_name" => "required",
            "event_date" => "required"
        ]);

        $calendarEvent = CalendarEvents::findOrFail($calendar_event_id);

        $image = $request->file('image');

        if ($image) {
            $imgName = md5(Str::random(30) . time() . '_' . $request->file('image')) . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move('uploads/calendar', $imgName);
            if (file_exists('uploads/calendar' . $calendarEvent->image) and !empty($calendarEvent->image)) {
                unlink('uploads/calendar' . $calendarEvent->image);
            }
            $calendarEvent->image = $imgName;
        } else {
            $calendarEvent->image = $calendarEvent->image;
        }

        $calendarEvent->event_name = $request->event_name;
        $calendarEvent->event_date = date("Y-m-d", strtotime(str_replace('/', '-', $request->event_date)));
        $calendarEvent->event_desc = $request->event_desc;

        $calendarEvent->save();

        return redirect()->route('calendar.event.index')->withSuccess(__('notification.updated_successfully'));
    }

    public function delete($calendar_event_id)
    {
        try {
            $calendarEvent = CalendarEvents::findOrFail($calendar_event_id);

            if (!is_null($calendarEvent->image)) {
                if (file_exists('uploads/calendar' . $calendarEvent->image) and !empty($calendarEvent->image)) {
                    unlink('uploads/calendar' . $calendarEvent->image);
                }
            }

            $calendarEvent->delete();

            return redirect()->route('calendar.event.index')->withSuccess(__('notification.deleted_successfully'));
        } catch (\Exception $exception) {
            return redirect()->route('calendar.event.index')->withError(__('notification.deleted_not_successfully'));
        }
    }
}
