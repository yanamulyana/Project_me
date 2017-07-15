<ul class="slides">
	{section name=dataPromo loop=$dataPromo}
		<li class="slide">
			<img alt="" src="images/promo/{$dataPromo[dataPromo].image}" style="padding: 20px;" />
			<div class="flex-caption">
				<h2 style="width: 50%;"><br>{$dataPromo[dataPromo].title}</h2>
				<div class="small">
					<br><span>{$dataPromo[dataPromo].description}</span>
				</div>
				<div>
					<span><a class="cusmo-btn" href="{$dataPromo[dataPromo].url}">Lihat Detail</a></span>
				</div>
			</div>
		</li>
	{/section}
</ul>