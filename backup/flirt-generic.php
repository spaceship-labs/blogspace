	<script type="text/javascript">
		FLIR.init({ path:'/facelift/' });
		FLIR.replace('h1', new FLIRStyle({ cFont:'sansation', cSize:'32'}) );
		FLIR.replace('h2', new FLIRStyle({ cFont:'sansation', cSize:'15'}) );
		FLIR.replace('a.topmenu', new FLIRStyle({ cFont:'sansation', cSize:'14'}, new FLIRStyle(/* this is the hover state */ {cFont:'sansation', cColor:'white', cSize:'14'}) ) );
		// The links will be automatically detected so nothing more than the usualy replace statement is required.


		/*
		Let's break down that FLIRStyle:

		new FLIRStyle( { cFont:'labtop_bold' } )  -- is just a normal FLIRStyle object.  You are passing along the {} options of cFont

		FLIRStyle also accepts a second argument of another FLIRStyle.  This second FLIRStyle is the hover state.

		In the above example, we are using:
		new FLIRStyle( { cFont:'labtop_bold', cColor:'yellow' } )

		And then we combine it together:

		new FLIRStyle( { regular_options_go_here } , new FLIRStyle( { hover_options_go_here } ) );
		*/
		</script>
