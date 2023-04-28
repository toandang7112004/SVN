<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
class ArticlePolicy
{
    use HandlesAuthorization;
    public function viewAny(User $user , $slug )
    {
        if( $slug == 'Channel' ){
            return $user->hasPermission('channel_viewAny');
        }
        if( $slug == 'Menu' ){
            return $user->hasPermission('menu_viewAny');
        }
        if( $slug == 'Movie' ){
            return $user->hasPermission('movie_viewAny');
        }
        if( $slug == 'Music' ){
            return $user->hasPermission('music_viewAny');
        }
        if( $slug == 'Service' ){
            return $user->hasPermission('service_viewAny');
        }
        if( $slug == 'Info' ){
            return $user->hasPermission('hotel_info_viewAny');
        }
        if( $slug == 'User' ){
            return $user->hasPermission('user_viewAny');
        }
        if( $slug == 'Group' ){
            return $user->hasPermission('group_viewAny');
        }
    }
   
    public function create(User $user , $slug )
    {
        if( $slug == 'Channel' ){
            return $user->hasPermission('channel_create');
        }
        if( $slug == 'Menu' ){
            return $user->hasPermission('menu_create');
        }
        if( $slug == 'Movie' ){
            return $user->hasPermission('movie_create');
        }
        if( $slug == 'Music' ){
            return $user->hasPermission('music_create');
        }
        if( $slug == 'Service' ){
            return $user->hasPermission('service_create');
        }
        if( $slug == 'Info' ){
            return $user->hasPermission('hotel_info_create');
        }
        if( $slug == 'User' ){
            return $user->hasPermission('user_create');
        }
        if( $slug == 'Group' ){
            return $user->hasPermission('group_create');
        }
    }
    public function update(User $user , $slug )
    {
        if( $slug == 'Channel' ){
            return $user->hasPermission('channel_update');
        }
        if( $slug == 'Menu' ){
            return $user->hasPermission('menu_update');
        }
        if( $slug == 'Movie' ){
            return $user->hasPermission('movie_update');
        }
        if( $slug == 'Music' ){
            return $user->hasPermission('music_update');
        }
        if( $slug == 'Service' ){
            return $user->hasPermission('service_update');
        }
        if( $slug == 'Info' ){
            return $user->hasPermission('hotel_info_update');
        }
        if( $slug == 'User' ){
            return $user->hasPermission('user_update');
        }
        if( $slug == 'Group' ){
            return $user->hasPermission('group_update');
        }
    }
    public function delete(User $user , $slug)
    {
        if( $slug == 'Channel' ){
            return $user->hasPermission('channel_delete');
        }
        if( $slug == 'Menu' ){
            return $user->hasPermission('menu_delete');
        }
        if( $slug == 'Movie' ){
            return $user->hasPermission('movie_delete');
        }
        if( $slug == 'Music' ){
            return $user->hasPermission('music_delete');
        }
        if( $slug == 'Service' ){
            return $user->hasPermission('service_delete');
        }
        if( $slug == 'Info' ){
            return $user->hasPermission('hotel_info_delete');
        }
        if( $slug == 'User' ){
            return $user->hasPermission('user_delete');
        }
        if( $slug == 'Group' ){
            return $user->hasPermission('group_delete');
        }
    }
}
