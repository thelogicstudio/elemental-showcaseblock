<div class="showcase <% if $ShowTitles == 'Yes' %>show-titles<% end_if %> <% if $ShowContents == 'Yes' %>show-contents<% end_if %> <% if $WidthType %>$WidthType.LowerCase<% end_if %>">
    <% if $Title && $ShowTitle %>
        <div class="showcase-title">
            $Title
        </div>
    <% end_if %>
    <div class="showcase-content">
        $Content
    </div>
    <% if $AllShowcaseItems %>
        <div class="showcase-items">
            <% loop $AllShowcaseItems %>
                <div class="showcase-item">
                    <div class="showcase-item-title">$Title</div>
                    <div class="showcase-item-image">$Image.Fill(150,150)</div>
                    <div class="showcase-item-desc">$Description</div>
                </div>
             <% end_loop %>
        </div>
    <% end_if %>
</div>
