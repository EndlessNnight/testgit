<table class="ad-table">
    <tr class="ad-table-td-tr-t">
        <td class="ad-table-list-td">
            <div class="ad-table-list-s">
                <h3>{{isset($promotionSc) ? $promotionSc : 0}}</h3>
                <span class="ad-table-list-a" >广告总数</span>
            </div>
        </td>
        <td class="ad-table-list-td">
            <div class="ad-table-list-s">
                <h3>{{isset($sc_ad_show) ? $sc_ad_show : 0}}</h3>
                <span class="ad-table-list-a">广告展现次数</span>
            </div>
        </td>
        <td class="ad-table-list-td">
            <div class="ad-table-list-s">
                <h3>{{isset($sc_time) ? $sc_time : 0}}</h3>
                <span class="ad-table-list-a">广告展现时长</span>
            </div>
        </td>
        <td class="ad-table-list-td">
            <div class="ad-table-list-s">
                <h3>{{isset($sc_click_use) ? $sc_click_use : 0}}</h3>
                <span class="ad-table-list-a">广告用户数量</span>
            </div>
        </td>
        <td class="ad-table-list-td">
            <div class="ad-table-list-s">
                <h3>{{isset($sc_click) ? $sc_click : 0}}</h3>
                <span class="ad-table-list-a">广告点击次数</span>
            </div>
        </td>
    </tr>
</table>