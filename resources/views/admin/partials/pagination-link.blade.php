<div class="row">
  <div class="col-6 text-left" style="font-size:13px; color:#138496;">
      <b>{{$paginator->count()}}</b> data out of <b>{{$paginator->Total()}}</b>
      &nbsp;&nbsp;|&nbsp;&nbsp;total <b>{{ $paginator->lastPage() }}</b> pages
      &nbsp;&nbsp;|&nbsp;&nbsp;Current Page <b>{{ $paginator->currentPage() }}</b>
 </div>
 <div class="col-6 text-right">
    @if($paginator->hasPages())
      @if($paginator->onFirstPage())
       <a class="btn btn-default btn-xs deasu" disabled>
         <i class="fa fa-long-arrow-alt-left"></i> Previous
       </a>&nbsp;
      @else
      <a href="{{$paginator->previousPageUrl()}}" class="btn btn-info btn-xs">
        <i class="fa fa-long-arrow-alt-left"></i> Previous
      </a>&nbsp;
      @endif
      @if($paginator->hasMorePages())
        <a href="{{$paginator->nextPageUrl()}}" class="btn btn-info btn-xs">
          Next <i class="fa fa-long-arrow-alt-right"></i>
        </a>
        @else
        <a class="btn btn-default btn-xs" disabled>
          Next <i class="fa fa-long-arrow-alt-right"></i>
        </a>
      @endif
    @endif

</div>
</div>
