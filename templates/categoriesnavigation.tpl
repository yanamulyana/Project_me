<ul class="inline top-cat-menu">
	<li><a href="home"><span >Home</span></a></li>
	
	{section name=dataNavCategory loop=$dataNavCategory}
		<li>
			<a href="category-0-1-{$dataNavCategory[dataNavCategory].categoryID}-{$dataNavCategory[dataNavCategory].categorySeo}.html" class="dropdown-toggle" data-hover="dropdown">{$dataNavCategory[dataNavCategory].categoryName}</a>
			{if $dataNavCategory[dataNavCategory].numsNavSubCategory > 0}
				<ul class="dropdown-menu">
					{section name=dataNavSubCategory loop=$dataNavCategory[dataNavCategory].dataNavSubCategory}
						<li style="margin: 0px; box-shadow: none;">
							<a href="subcategory-0-1-{$dataNavCategory[dataNavCategory].dataNavSubCategory[dataNavSubCategory].subCategoryID}-{$dataNavCategory[dataNavCategory].dataNavSubCategory[dataNavSubCategory].subCategorySeo}.html">
								{$dataNavCategory[dataNavCategory].dataNavSubCategory[dataNavSubCategory].subCategoryName}
							</a>
						</li>
					{/section}
				</ul>
			{/if}
		</li>
	{/section}
	{if $numsNavCategory > 6}
		<li>
			<a class="dropdown-toggle" data-hover="dropdown" href="#">More</a>
			<ul class="dropdown-menu">
				{section name=dataNavCategory2 loop=$dataNavCategory2}
					<li style="margin: 0px; box-shadow: none;"><a href="category-0-1-{$dataNavCategory2[dataNavCategory2].categoryID}-{$dataNavCategory2[dataNavCategory2].categorySeo}.html">{$dataNavCategory2[dataNavCategory2].categoryName}</a></li>
				{/section}
			</ul>
		</li>
	{/if}

	<li><a href="confirm.html" ><span >Konfirmasi Pembayaran</span></a></li>
	<li><a href="cara-berbelanja.html" ><span >Cara Belanja</span></a></li>
	<li><a href="about-us.html" ><span >Profil</span></a></li>
	<li><a href="contact-us.html" ><span >Kontak</span></a><li>

</ul>


<select class="top-cat-menu dropdown">
	<option value="#">- Pilih Kategori Produk -</option>
	{section name=dataNavCategory loop=$dataNavCategory}
		{if $dataNavCategory[dataNavCategory].categoryID == $categoryID}
			<option value="category-0-1-{$dataNavCategory[dataNavCategory].categoryID}-{$dataNavCategory[dataNavCategory].categorySeo}.html" SELECTED>{$dataNavCategory[dataNavCategory].categoryName}</option>
		{else}
			<option value="category-0-1-{$dataNavCategory[dataNavCategory].categoryID}-{$dataNavCategory[dataNavCategory].categorySeo}.html">{$dataNavCategory[dataNavCategory].categoryName}</option>
		{/if}
	{/section}
	{section name=dataNavCategory2 loop=$dataNavCategory2}
		{if $dataNavCategory2[dataNavCategory2].categoryID == $categoryID}
			<option value="category-0-1-{$dataNavCategory2[dataNavCategory2].categoryID}-{$dataNavCategory2[dataNavCategory2].categorySeo}.html" SELECTED>{$dataNavCategory2[dataNavCategory2].categoryName}</option>
		{else}
			<option value="category-0-1-{$dataNavCategory2[dataNavCategory2].categoryID}-{$dataNavCategory2[dataNavCategory2].categorySeo}.html">{$dataNavCategory2[dataNavCategory2].categoryName}</option>
		{/if}
	{/section}
</select>