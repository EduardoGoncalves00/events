<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Zones extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    public function ticket()
    {
        return $this->hasMany(Tickets::class, 'zone_id', 'id');
    }

    public function event()
    {
        return $this->hasMany(Tickets::class, 'zone_id', 'id');
    }

    public function addTicketsBought($ticket)
    {
        $zone = $this->findOrFail($ticket->zone);
        $zone->bought += $ticket->quantity;
        $zone->save();
    }

    public function ticketValue($zoneid)
    {
        $zoneValue = [];

        $zoneValueModel = Zones::where('id', $zoneid)->get();
        foreach ($zoneValueModel as $value) {
            $zoneValue[] = $value->value;
        }
        
        return [
            'ticketValue' => $zoneValue[0]
        ];
    }

    public function getZonesByAuthenticatedUserEvents()
    {
        $user = Auth::user();
    
        return Zones::whereIn('event', function ($query) use ($user) {
            $query->select('id')
                ->from('events')
                ->where('creator', $user->id);
        })->get();
    }

    // public function zoneWithRemainingTickets($eventId)
    // {
    //     $zonesEvent = Zones::where('event', intval($eventId))->get();

    //     foreach ($zonesEvent as $zone) {
    //         dd($zone->name);
    //     }
    // }
}
