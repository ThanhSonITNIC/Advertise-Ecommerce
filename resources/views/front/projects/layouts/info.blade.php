<ul class="blog-info-link">
    @if($project->customer)
    <li><i class="fa fa-user"></i> {{$project->customer->name}}</li>
    @endif
    <li><i class="fa fa-calendar"></i> {{$project->start_at}}</li>
    @if($project->finished_at)
    <li><i class="fa fa-calendar-check-o"></i> {{$project->finished_at}}</li>
    @endif
    @if($project->subtotal)
    <li><i class="fa fa-usd"></i> {{$project->subtotal}}</li>
    @endif
</ul>