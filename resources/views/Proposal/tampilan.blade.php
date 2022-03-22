@foreach($proposal as $nm)
<iframe src="{{ asset ('/storage/proposal/'. $nm->nama_proposal)}} " align="top" height="1000px" width="100%" frameborder="0" scrolling="auto"></iframe>
@endforeach