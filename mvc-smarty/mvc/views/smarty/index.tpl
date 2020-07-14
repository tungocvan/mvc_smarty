{config_load file="test.conf" section="setup"}
{include file="{SMARTY_TEMPLATE}/header.tpl"}
{section name=outer
    loop=$FirstName}
        {if $smarty.section.outer.index is odd by 2}
            {$smarty.section.outer.rownum} . {$FirstName[outer]} {$LastName[outer]}
        {else}
            {$smarty.section.outer.rownum} * {$FirstName[outer]} {$LastName[outer]}
        {/if}
        {sectionelse}
        none
{/section}

<form>
    {html_select_date start_year=1998 end_year=2010}
</form>
<form>
    <select name=states>
        {html_options values=$option_values selected=$option_selected output=$option_output}
    </select>
</form>

{include file="{SMARTY_TEMPLATE}/footer.tpl"}