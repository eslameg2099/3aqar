<x-layout :title="trans('dashboard.home')" :breadcrumbs="['dashboard.home']">
<div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ \App\Models\Order::whereDate('created_at', today())->count() }}</h3>

                    <p>{{ __('الطلبات اليوم') }}</p>
                </div>
                <a href="" class="small-box-footer">
                    @lang('عرض المزيد')
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
                <div class="icon">
                            <i class="fas fa-th"></i>
                        </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ \App\Models\User::count() }}</h3>
                    <p>{{ __('عد المستخدمين') }}</p>
                </div>
                <a href="" class="small-box-footer">
                    @lang('عرض المزيد')
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
                <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ \App\Models\Estate::count() }}</h3>

                    <p>{{ __('عدد العقارات') }}</p>
                </div>
                <a href="" class="small-box-footer">
                    @lang('عرض المزيد')
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
                <div class="icon">
                            <i class="fas fa-building"></i>

                        </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ \App\Models\Report::count() }}</h3>

                    <p>{{ __('عدد البلاغات') }}</p>
                </div>
                <a href="" class="small-box-footer">
                    @lang('عرض المزيد')
                    <i class="fas fa-arrow-circle-right"></i>
                </a>
                
                <div class="icon">
                            <i class="fas fa-bug"></i>

                         </div>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-12 col-6">

           <div class="box-body border-radius-none">
           <div class="chart" id="line-chart" style="height: 400px;"></div>
        </div>

</div>


    @push('scripts')

    <script>

        //line chart
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                @foreach ($sales_data as $data)
                {
                    ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"
                },
                @endforeach
            ],
            xkey: 'ym',
            ykeys: ['sum'],
            labels: ['عدد العقارات'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
       
    </script>

@endpush
</x-layout>

