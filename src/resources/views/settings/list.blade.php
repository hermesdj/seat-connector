@extends('web::layouts.grids.12')

@section('title', trans_choice('seat-connector::seat.settings', 0))
@section('page_header', trans_choice('seat-connector::seat.settings', 0))

@section('full')

    <div class="row">

        <div class="col-md-3">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{trans('seat-connector::seat.settings_common')}}</h3>
                </div>
                <div class="card-body">
                    <form method="post" id="seat-connector-setup">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="security-level">{{trans('seat-connector::seat.settings_security_level')}}</label>
                            <select id="security-level" name="security-level" class="form-control">
                                @if(setting('seat-connector.strict', true))
                                    <option value="strict"
                                            selected>{{trans('seat-connector::seat.settings_security_level_strict')}}</option>
                                @else
                                    <option value="strict">{{trans('seat-connector::seat.settings_security_level_strict')}}</option>
                                @endif
                                @if(setting('seat-connector.strict', true))
                                    <option value="normal">{{trans('seat-connector::seat.settings_security_level_normal')}}</option>
                                @else
                                    <option value="normal"
                                            selected>{{trans('seat-connector::seat.settings_security_level_normal')}}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="use-ticker">{{trans('seat-connector::seat.settings_use_ticker')}}</label>
                            <div class="radio">
                                <label>
                                    @if(setting('seat-connector.ticker', true))
                                        <input type="radio" id="use-ticker" name="use-ticker"
                                               value="0"/> {{trans('seat-connector::seat.settings_use_ticker_no')}}
                                    @else
                                        <input type="radio" id="use-ticker" name="use-ticker" value="0"
                                               checked/> {{trans('seat-connector::seat.settings_use_ticker_no')}}
                                    @endif
                                </label>
                                <label>
                                    @if(setting('seat-connector.ticker', true))
                                        <input type="radio" id="use-ticker" name="use-ticker" value="1"
                                               checked/> {{trans('seat-connector::seat.settings_use_ticker_yes')}}
                                    @else
                                        <input type="radio" id="use-ticker" name="use-ticker"
                                               value="1"/> {{trans('seat-connector::seat.settings_use_ticker_yes')}}
                                    @endif
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="prefix-format">{{trans('seat-connector::seat.settings_prefix_mask')}}</label>
                            @if(setting('seat-connector.format', true) == '')
                                <input type="text" id="prefix-format" name="prefix-format" class="form-control"
                                       value="[%2$s] %1$s"/>
                            @else
                                <input type="text" id="prefix-format" name="prefix-format" class="form-control"
                                       value="{{ setting('seat-connector.format', true) }}"/>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="card-footer clearfix">
                    <button type="submit" class="btn btn-success float-right"
                            form="seat-connector-setup">{{ trans('seat-connector::seat.save') }}</button>
                </div>
            </div>

        </div>

        <div class="col-md-9">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">{{ trans('seat-connector::seat.settings_management') }}</h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-6 no-padding">

                            <div class="row">

                                <div class="col-6">
                                    <button type="button" role="button" id="seat-connector-sets"
                                            class="btn btn-success btn-block btn-flat">{{ trans('seat-connector::seat.settings_update_sets_btn') }}
                                    </button>
                                    <span class="help-block">{{ trans('seat-connector::seat.settings_update_sets_desc') }}</span>
                                </div>

                                <div class="col-6">
                                    <button type="button" role="button" id="seat-connector-terminator"
                                            class="btn btn-danger btn-block btn-flat">{{ trans('seat-connector::seat.settings_reset_everybody_btn') }}
                                    </button>
                                    <span class="help-block">{{ trans('seat-connector::seat.settings_reset_everybody_desc') }}</span>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-6">
                                    <button type="button" role="button" id="seat-connector-policy"
                                            class="btn btn-success btn-block btn-flat">{{ trans('seat-connector::seat.settings_sync_users_btn') }}
                                    </button>
                                    <span class="help-block">{{ trans('seat-connector::seat.settings_sync_users_desc') }}</span>
                                </div>

                                <div class="col-6">
                                    <select id="driver-selector" class="form-control">
                                        <option value="">{{ trans('seat-connector::seat.settings_all_drivers') }}</option>
                                        @foreach($drivers as $key => $driver)
                                            <option value="{{ $key }}">{{ ucfirst($driver->name) }}</option>
                                        @endforeach
                                    </select>
                                    <span class="help-block">{{ trans('seat-connector::seat.settings_all_drivers_desc') }}</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <dl class="dl-horizontal">
                                <dt>{{ trans('seat-connector::seat.settings_security_level') }}</dt>
                                <dd>{!! trans('seat-connector::seat.settings_security_level_desc') !!}
                                </dd>

                                <dt>{{ trans('seat-connector::seat.settings_use_ticker_title') }}</dt>
                                <dd>{!! trans('seat-connector::seat.settings_use_ticker_desc') !!}
                                </dd>

                                <dt>{{ trans('seat-connector::seat.settings_prefix_mask') }}</dt>
                                <dd>{!! trans('seat-connector::seat.settings_prefix_mask_desc') !!}
                                </dd>
                            </dl>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

    @foreach($drivers->split(ceil($drivers->count() / 3)) as $row)

        <div class="row">

            @foreach($row as $key => $driver)

                <div class="col-md-3">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <i class="{{ $driver->icon }}"></i>
                                {{ ucfirst($driver->name) }}
                            </h4>
                        </div>
                        <div class="card-body">
                            <form role="form" method="post" id="{{ sprintf('seat-connector-%s', $key) }}"
                                  action="{{ route(sprintf('seat-connector.drivers.%s.settings', $key)) }}">
                                {{ csrf_field() }}

                                @foreach($driver->settings as $field)
                                    @switch($field->type)
                                        @case("checkbox")
                                            <div class="form-group">
                                                <label for="{{ sprintf('seat-connector-%s-%s', $key, $field->name) }}">{{ trans($field->label) }}</label>
                                                <input type="checkbox" name="{{ $field->name }}"
                                                       id="{{ sprintf('seat-connector-%s-%s', $key, $field->name) }}"
                                                       class="form-check"
                                                       value="1" @if($field->value == 1) checked @endif />
                                            </div>
                                            @break
                                        @default
                                            <div class="form-group">
                                                <label for="{{ sprintf('seat-connector-%s-%s', $key, $field->name) }}">{{ trans($field->label) }}</label>
                                                <input type="text" name="{{ $field->name }}"
                                                       id="{{ sprintf('seat-connector-%s-%s', $key, $field->name) }}"
                                                       class="form-control"
                                                       value="{{ $field->value }}"/>
                                            </div>
                                    @endswitch
                                @endforeach
                            </form>
                        </div>
                        <div class="card-footer">
                            <button type="submit" form="{{ sprintf('seat-connector-%s', $key) }}"
                                    class="btn btn-success float-right">{{ trans('seat-connector::seat.save') }}</button>
                        </div>
                    </div>

                </div>

            @endforeach

        </div>

    @endforeach

@stop

@push('javascript')
    <script>
        $('#seat-connector-sets, #seat-connector-policy, #seat-connector-terminator').on('click', function (e) {
            var command = '';
            var driver = $('#driver-selector').val();

            switch (e.target.id) {
                case 'seat-connector-sets':
                    command = 'seat-connector:sync:sets';
                    break;
                case 'seat-connector-policy':
                    command = 'seat-connector:apply:policies';
                    break;
                case 'seat-connector-terminator':
                    command = 'seat-connector:apply:policies --terminator';
                    break;
            }

            $.ajax({
                'method': 'post',
                'url': '{{ route('seat-connector.settings.command') }}',
            'data': {
                'driver': driver,
                'command': command
            },
        });
    });
  </script>
@endpush
