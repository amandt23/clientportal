<!-- resources/views/errors/unread-notifications.blade.php -->

@extends('layouts.app') {{-- Change 'layouts.app' to your actual layout if different --}}

@section('title', __('Error'))
@section('code', '500')
@section('message', __('Sorry, an error occurred while trying to fetch unread notifications.'))
