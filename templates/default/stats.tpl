<div id="bcstats">
    <div class="row">
        <table style="width:100%" class="table table-striped table-borderless table-sm">
            <thead class="thead-light">
                <tr>
                    <th colspan="{if chart}3{else}2{/if}">{translate('Pages by visibility')}</th>
                </tr>
            </thead>
            <tbody>
                {if chart}{assign count($visibility) rows}
                <tr><td rowspan="{$rows+1}">{$chart}</td></tr>
                {/if}
                {foreach $visibility key value}
                <tr><td>{translate($key)}</td><td>{$value}</td></tr>
                {/foreach}
            </tbody>
            <thead class="thead-light">
                <tr>
                    <th colspan="{if chart}3{else}2{/if}">{translate('Latest changed pages')}</th>
                </tr>
            </thead>
            <tbody>
                {foreach $latest item}
                    <tr>
                        <td><a href="{$CAT_ADMIN_URL}/pages/modify.php?page_id={$item.page_id}">{$item.menu_title}</a></td>
                        <td{if chart} colspan="2"{/if}>{cat_format_date($item.modified_when,1)}</td>
                    </tr>
                    {/foreach}
            </tbody>
        </table>
    </div>
</div>
