<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hike extends Model
{
    public function peaks()
    {
    	# With timestamps() will ensure the pivot table has its created_at/updated_at fields automatically maintained
    	return $this->belongsToMany('\App\Peak')->withTimestamps();
    }

    public function user() {
        # Hike belongs to User
        # Define an inverse one-to-many relationship.
        return $this->belongsTo('\App\User');
    }

    /*
    * This is supposed to convert date stamps on hikes to relative time ('x days ago'), 
    * but I can't get it to implement the way I want. 
    * May end up deleting.
    */

    public function relativeTime() {
        $hikes = $this->get();

        foreach ($hikes as $hike) {
            $today = date_create();
            $date_of_hike = date_create_from_format('Y-m-d', $hike->date_hiked);
            $diff = date_diff($date_of_hike, $today);
            if ($diff->d <  1) {
                $hike->date_hiked = $diff->format('%h hours');
            }
            else if ($diff->d === 1) {
                $hike->date_hiked = '1 day';
            }
            else if ($diff->m < 1) {
                $hike->date_hiked = $diff->format('%d days');
            }
            else if ($diff->m === 1) {
                $hike->date_hiked = $diff->format ('1 month');
            }
            else if ($diff->y < 1) {
                $hike->date_hiked = $diff->format ('%m months');
            }
            else if ($diff->y === 1) {
                $hike->date_hiked = $diff->format ('1 year');
            }
            else {
                $hike->date_hiked = $diff->format ('%y years');
            }
        }
        return $hikes;
    }
}
