<?php

/*
 * This file is part of seat-connector and provides user synchronization between both SeAT and third party platform
 *
 * Copyright (C) 2019 to 2022 Loïc Leuilliot <loic.leuilliot@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

return [
    'settings'           => 'Settings',
    'save'               => 'Save',

    'toolbox'            => 'Toolbox',
    'access_management'  => 'Access Management',
    'user_mapping'       => 'User Mapping',
    'journal'            => 'Journal',

    'all_filter'         => 'All Filters',
    'public_filter'      => 'Public Filters',
    'user_filter'        => 'User Filters',
    'role_filter'        => 'Role Filters',
    'corporation_filter' => 'Corporation Filters',
    'title_filter'       => 'Title Filters',
    'alliance_filter'    => 'Alliance Filters',
    'squad_filter'       => 'Squad Filters',

    'driver'             => 'Driver',
    'sets'               => 'Set|Sets',
    'access'             => 'Access',
    'entity_name'        => 'Entity Name',

    'remove'             => 'Remove',
    'help'               => 'Help',

    'datetime'           => 'Date/Time',
    'category'           => 'Category',
    'message'            => 'Message',
    'level'              => 'Level',

    'user_id'            => 'User ID',
    'character_id'       => 'Character ID',
    'character_name'     => 'Character Name',
    'connector_id'       => 'Connector ID',
    'connector_name'     => 'Connector Name',

    'identities'         => 'Identity|Identities',

    'no_driver_available' => 'No driver available!',
    'install_seat_driver_message' => 'In order to use this page, you need to install a seat-connector driver.',

    'missing_platforms' => 'Missing platforms',
    'missing_platforms_message' => 'The administrator of this instance didn\'t configure any platform yet.<br/>Please come back later.',

    'status_registered' => 'Registered',
    'status_unregistered' => 'Unregistered',

    'join_server' => 'Join Server',

    'logs_description' => 'This section is designed to show you important information regarding your registered drivers and the connector health.
        You can use elements from this box in order to filter entries from the table.',

    'log_level_debug' => 'Debug',
    'log_level_info' => 'Info',
    'log_level_notice' => 'Notice',
    'log_level_warning' => 'Warning',
    'log_level_error' => 'Error',
    'log_level_critical' => 'Critical',
    'log_level_alert' => 'Alert',
    'log_level_emergency' => 'Emerg.',

    'settings_common' => 'Common',
    'settings_security_level' => 'Security Level',
    'settings_security_level_strict' => 'Strict',
    'settings_security_level_normal' => 'Normal',
    'settings_security_level_desc' => 'Determine how policy must be applied. Using <code>strict</code> will require user
                                    have all their linked character with a valid ESI access. Otherwise, they will loose
                                    all their access.',

    'settings_use_ticker' => 'Use ticker ?',
    'settings_use_ticker_title' => 'Use Ticker',
    'settings_use_ticker_yes' => 'Yes',
    'settings_use_ticker_no' => 'No',
    'settings_use_ticker_desc' => 'If yes is selected, the Character Corporation Ticker will be added to the name
                                    according to <code>prefix mask</code>.',

    'settings_prefix_mask' => 'Prefix mask',
    'settings_prefix_mask_desc' => 'This is the pattern which will define how ticker must be put. <code>%1$s</code> is
                                    referring to <b>Character Name</b>. <code>%2$s</code> is referring to <b>Corporation
                                        Ticker</b>. <code>%3$s</code> is referring to <b>Alliance Ticker</b>.',

    'settings_management' => 'Management',

    'settings_update_sets_btn' => 'Update Sets',
    'settings_update_sets_desc' => 'This will update known Sets from selected Drivers.',
    'settings_reset_everybody_btn' => 'Reset Everybody',
    'settings_reset_everybody_desc' => 'This will remove all Set from every Users on selected Drivers.',
    'settings_sync_users_btn' => 'Sync. Users',
    'settings_sync_users_desc' => 'This will apply Users policy to selected Drivers.',

    'settings_all_drivers' => 'All Drivers',
    'settings_all_drivers_desc' => 'This will determine for which driver action have to be queue.',





];
