<div class="table-responsive">
    <table class="table table-striped" id="customer-table">
        <thead>
            <tr>
                @foreach($headers as $header)
                <th>{{ $header }}</th>
                @endforeach
                <th style="width: 150px;" class="text-center pt-2">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($records as $record)
            <tr>
                @foreach($columns as $column)
                    @if ($column == 'role')
                        <td>    
                        @if(!empty($record->getRoleNames()))
                            @foreach($record->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                        </td>
                    @else 
                        <td>{{$record[$column]}}</td>
                    @endif
                @endforeach
                <td class="text-center pt-2 flex-column">
                    @isset($routes[0])
                    @php
                        if (!empty($params)) {
                            $route_params = $params;
                            array_push($route_params, $record['id']);
                        } else {
                            $route_params = $record['id'];
                        }
                    @endphp
                    <a style="text-decoration: none; color: white;" href="{{ route($routes[0], $route_params) }}">
                        <div class="badge badge-success">
                            <i class="fas fa-edit"></i>
                        </div>
                    </a>
                    @endisset
                    @isset($routes[1])
                    <a style="text-decoration: none; color: white;" href="{{ route($routes[1], $record['id']) }}">
                        <div class="badge badge-danger">
                            <i class="fas fa-trash"></i>
                        </div>
                    </a>
                    @endisset
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>