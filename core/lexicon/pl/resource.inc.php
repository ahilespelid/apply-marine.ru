<?php
/**
 * Resource English lexicon topic
 *
 * @language en
 * @package modx
 * @subpackage lexicon
 */
$_lang['access'] = 'Dostęp';
$_lang['cache_output'] = 'Zawartość pamięci podręcznej';
$_lang['changes'] = 'Daty i autorzy';
$_lang['class_key'] = 'Klucz klasy';
$_lang['context'] = 'Kontekst';
$_lang['document'] = 'Dokument';
$_lang['document_create'] = 'Utwórz dokument';
$_lang['document_create_here'] = 'Dokument';
$_lang['document_new'] = 'Utwórz nowy Dokument';
$_lang['documents'] = 'Dokumenty';
$_lang['duplicate_uri_found'] = 'Wybrany alias [[+uri]] jest już używany przez zasób [[+id]]. Wprowadź unikalny alias lub użyj opcji niezależnego aliasu, aby go ręcznie wymusić.';
$_lang['empty_template'] = '(brak)';
$_lang['general'] = 'Główne';
$_lang['markup'] = 'Markup/Structure';
$_lang['none'] = 'Żaden';
$_lang['page_settings'] = 'Ustawienia';
$_lang['preview'] = 'Podgląd';
$_lang['resource_access_message'] = 'Tutaj możesz zmienić przypisanie tego zasobu do Grup Zasobów.';
$_lang['resource_add_children_access_denied'] = 'Nie masz uprawnień do utworzenia nowego zasobu w tym miejscu.';
$_lang['resource_alias'] = 'Alias';
$_lang['resource_alias_help'] = 'An alias for this resource. This will make the resource accessible using:<br /><br />https://yourserver/alias<br /><br /><strong>Note</strong>This only works if you\'re using friendly URLs.';
$_lang['resource_alias_visible'] = 'Use current alias in alias path';
$_lang['resource_alias_visible_help'] = 'The alias of this Resource is inserted in Friendly URL alias path';
$_lang['resource_change_template_confirm'] = 'Czy na pewno chcesz zmienić szablon? <strong>Uwaga:</strong> Spowoduje to <b>tylko tymczasowe zapisanie</b> dotychczasowych zmian i ponowne wczytanie strony. Upewnij się, że jesteś do tego przygotowany.<br /><br />Po ponownym wczytaniu strony, musisz zapisać zmiany, aby zachować nowe ustawienie szablonu.';
$_lang['resource_cacheable'] = 'Pamięć podręczna';
$_lang['resource_cacheable_help'] = 'Jeżeli zaznaczone, zawartość zasobu będzie przechowywana w pamięci podręcznej dla szybszego wyświetlania.';
$_lang['resource_cancel_dirty_confirm'] = 'Istnieją nie zapisane zmiany! Czy na pewno chcesz anulować?';
$_lang['resource_class_key_help'] = 'This is the class key of the resource, showing its MODX type.';
$_lang['resource_content'] = 'Zawartość';
$_lang['resource_contentdispo'] = 'Traktowanie zawartości';
$_lang['resource_contentdispo_help'] = 'Określa zachowanie przeglądarki przy otwieraniu zasobu: wyświetlenie w przeglądarce lub pobranie w postaci pliku.';
$_lang['resource_content_type'] = 'Format zawartości';
$_lang['resource_content_type_help'] = 'Określa format zawartości zasobu.';
$_lang['resource_create_access_denied'] = 'Nie masz uprawnień, aby utworzyć nowy zasób.';
$_lang['resource_create_here'] = 'Zasób';
$_lang['resource_createdby'] = 'Utworzył(a)';
$_lang['resource_createdon'] = 'Utworzono';
$_lang['resource_delete'] = 'Skasuj';
$_lang['resource_delete_confirm'] = 'Czy na pewno chcesz skasować ten zasób?<br />Uwaga: Wszystkie zasoby podrzędne także zostaną skasowane!';
$_lang['resource_description'] = 'Opis';
$_lang['resource_description_help'] = 'Krótki opis zawartości, zwykle używany w menu oraz przez wyszukiwarki.';
$_lang['resource_duplicate'] = 'Utwórz duplikat';
$_lang['resource_duplicate_confirm'] = 'Czy na pewno chcesz utworzyć duplikat tego zasobu? Wszystkie podrzędne zasoby także zostaną powielone.';
$_lang['resource_edit'] = 'Edytuj';
$_lang['resource_editedby'] = 'Zaktualizował(a)';
$_lang['resource_editedon'] = 'Zaktualizowano';
$_lang['resource_err_change_parent_to_folder'] = 'An error occurred while attempting to change the resource\'s parent to a folder.';
$_lang['resource_err_class'] = 'The resource is not a valid [[+class]].';
$_lang['resource_err_create'] = 'Podczas tworzenia zasobu wystąpił błąd.';
$_lang['resource_err_delete'] = 'Podczas usuwania zasobu wystąpił błąd.';
$_lang['resource_err_delete_children'] = 'Podczas usuwania zasobów podrzędnych wystąpił błąd.';
$_lang['resource_err_delete_container_sitestart'] = 'Próbujesz usunąć zasób, który zawiera zasób [[+id]]. Ten zasób jest używany jako domyślny i nie może zostać skasowany! Przypisz inny zasób jako startowy i spróbuj ponownie.';
$_lang['resource_err_delete_container_siteunavailable'] = 'Próbujesz usunąć zasób, który zawiera zasób [[+id]]. Ten zasób jest używany jako strona błędu <abbr title="Nie znaleziono takiego dokumentu!">404</abbr> i nie może zostać skasowany!';
$_lang['resource_err_delete_sitestart'] = 'Ten zasób jest używany jako domyślny i nie może zostać skasowany!';
$_lang['resource_err_delete_siteunavailable'] = 'Ten zasób jest używany jako strona błędu <abbr title="Nie znaleziono takiego dokumentu!">404</abbr> i nie może zostać skasowany!';
$_lang['resource_err_duplicate'] = 'Podczas tworzenia duplikatu wystąpił błąd.';
$_lang['resource_err_move_to_child'] = 'Nie można przenieść zasobu poniżej któregokolwiek z jego zasobów podrzędnych.';
$_lang['resource_err_move_sitestart'] = 'Ten zasób jest używany jako domyślny i nie może zostać przesunięty do innego kontekstu!';
$_lang['resource_err_nf'] = 'Nie znaleziono zasobu.';
$_lang['resource_err_nfs'] = 'Nie znaleziono zasobu z ID: [[+id]]';
$_lang['resource_err_ns'] = 'Nie określono zasobu.';
$_lang['resource_err_own_parent'] = 'Zasób nie może być nadrzędny dla samego siebie.';
$_lang['resource_err_publish']  = 'Podczas publikowania zasobu wystąpił błąd.';
$_lang['resource_err_new_parent_nf'] = 'Nowy zasób nadrzędny o ID [[+id]] nie został znaleziony.';
$_lang['resource_err_remove'] = 'Podczas usuwania zasobu wystąpił błąd.';
$_lang['resource_err_save'] = 'Podczas zapisywania zasobu wystąpił błąd.';
$_lang['resource_err_select_parent'] = 'Wybierz zasób nadrzędny.';
$_lang['resource_err_symlink_target_invalid'] = 'The symlink target does not contain an integer value.';
$_lang['resource_err_symlink_target_nf'] = 'You cannot symlink to a resource that does not exist.';
$_lang['resource_err_symlink_target_self'] = 'You cannot symlink to itself.';
$_lang['resource_err_undelete'] = 'Podczas odzyskiwania zasobu wystąpił błąd.';
$_lang['resource_err_undelete_children'] = 'Podczas odzyskiwania zasobów podrzędnych wystąpił błąd.';
$_lang['resource_err_unpublish'] = 'Podczas przerywania publikacji zasobu wystąpił błąd.';
$_lang['resource_err_unpublish_sitestart'] = 'Ten zasób jest używany jako domyślny i nie można przerwać jego publikacji!';
$_lang['resource_err_unpublish_sitestart_dates'] = 'Ten zasób jest używany jako domyślny i nie może posiadać dat rozpoczęcia i zakończenia publikacji!';
$_lang['resource_err_weblink_target_nf'] = 'You cannot set a weblink to a resource that does not exist.';
$_lang['resource_err_weblink_target_self'] = 'You cannot set a weblink to itself.';
$_lang['resource_folder'] = 'Zasobnik';
$_lang['resource_folder_help'] = 'Jeżeli zaznaczone, ten zasób służy również jako zasobnik, tj. może zawierać inne zasoby i jego adres wyświetlany jest z ukośnikiem (<code>/</code>) na końcu. Zasobnik przypomina folder, ale może mieć także własną zawartość.';
$_lang['resource_group_resource_err_ae'] = 'Zasób już należy do tej grupy zasobów.';
$_lang['resource_group_resource_err_nf'] = 'Ten zasób nie jest częścią tej grupy zasobów.';
$_lang['resource_hide_from_menus'] = 'Ukrycie w menu';
$_lang['resource_hide_from_menus_help'] = 'Jeżeli zaznaczone, zasób <strong>nie jest wyświetlany</strong> w menu serwisu.';
$_lang['resource_link_attributes'] = 'Atrybuty odnośnika';
$_lang['resource_link_attributes_help'] = 'Atrybuty odnośnika do tego zasobu, takie jak <code>target=</code> lub <code>rel=</code>.';
$_lang['resource_locked_by'] = 'Edytuje [[+user]]';
$_lang['resource_longtitle'] = 'Pełny tytuł';
$_lang['resource_longtitle_help'] = 'Tytuł w pełnym brzmieniu, zazwyczaj używany w treści, aby lepiej opisać zawartość i wspierać indeksowanie przez wyszukiwarki.';
$_lang['resource_menuindex'] = 'Pozycja w menu';
$_lang['resource_menuindex_help'] = 'Pozycja zasobu w menu, zazwyczaj używana do określenia kolejności zasobów wyświetlanych w menu serwisu.';
$_lang['resource_menutitle'] = 'Tytuł w menu';
$_lang['resource_menutitle_help'] = 'Tytuł skrócony, zazwyczaj używany w menu serwisu.';
$_lang['resource_new'] = 'Nowy dokument';
$_lang['resource_notcached'] = 'Ten zasób nie został (jeszcze) zapisany do pamięci podręcznej.';
$_lang['resource_pagetitle'] = 'Tytuł';
$_lang['resource_pagetitle_help'] = 'Tytuł lub nazwa zasobu, zwykle wyświetlany w tytule okna.';
$_lang['resource_parent'] = 'Podrzędny do';
$_lang['resource_parent_help'] = 'Nr ID zasobu nadrzędnego.';
$_lang['resource_parent_select_node'] = 'Wybierz zasób nadrzędny w menu.';
$_lang['resource_publish'] = 'Publikuj';
$_lang['resource_publish_confirm'] = 'Użycie tego polecenie do rozpoczęcia publikacji spowoduje usunięcie zaplanowanych dat rozpoczęcia i zakończenia publikacji, o ile zostały zdefiniowane. Jeżeli chcesz je teraz zdefiniować, bądź teraz rozpocząc publikację, ale zachować te daty, dokonaj edycji i ustaw właściwą opcję.<br /><br />Czy chcesz kontynuować?';
$_lang['resource_publishdate'] = 'Data publikacji';
$_lang['resource_publishdate_help'] = 'Data, po upływie której publikacja zasobu <strong>zostanie rozpoczęta</strong>. Pozostaw puste, aby nie włączać tej opcji.';
$_lang['resource_published'] = 'Opublikowany';
$_lang['resource_published_help'] = 'Jeżeli zaznaczone, zasób zostanie opublikowany natychmiast po zapisaniu zmian.';
$_lang['resource_publishedby'] = 'Opublikował(a)';
$_lang['resource_publishedon'] = 'Opublikowano';
$_lang['resource_publishedon_help'] = 'Data, od której publikacja <strong>została rozpoczęta</strong>.';
$_lang['resource_refresh'] = 'Odśwież';
$_lang['resource_richtext'] = 'Edytor wizualny';
$_lang['resource_richtext_help'] = 'Jeżeli zaznaczone, do edycji zostanie użyty edytor wizualny. Jeżeli treść zawiera JavaScript lub formularze, odznacz tę opcję, aby edytor jej nie zniekształcił.';
$_lang['resource_searchable'] = 'Wyszukiwany';
$_lang['resource_searchable_help'] = 'Jeżeli zaznaczone, zasób jest uwzględniany w wynikach wyszukiwania.';
$_lang['resource_settings'] = 'Resource Settings';
$_lang['resource_status'] = 'Status';
$_lang['resource_status_help'] = 'Jeśli opublikujesz ten dokument, będzie on dostępny natychmiast po jego zapisaniu. W przeciwnym wypadku nie będzie widoczny dla użytkowników strony.';
$_lang['resource_summary'] = 'Podsumowanie';
$_lang['resource_summary_help'] = 'Krótkie podsumowanie treści.';
$_lang['resource_syncsite'] = 'Odświeżanie przy zapisie';
$_lang['resource_syncsite_help'] = 'Jeżeli zaznaczone, zawartość pamięci podręcznej będzie usuwana przy zapisywaniu, przez co zmiany będą natychmiast widoczne. Jeżeli niezaznaczone, zmiany staną się widoczne dopiero po ręcznym odświeżeniu zasobu.';
$_lang['resource_template'] = 'Szablon';
$_lang['resource_template_help'] = 'Szablon użyty dla zasobu, który definiuje sposób wyświetlania i dostępne dodatkowe pola dla zawartości.';
$_lang['resource_undelete'] = 'Przywróć';
$_lang['resource_unpublish'] = 'Cofnij publikację';
$_lang['resource_unpublish_confirm'] = 'Użycie tego polecenie do przerwania publikacji spowoduje usunięcie zaplanowanych dat rozpoczęcia i zakończenia publikacji, o ile zostały zdefiniowane. Jeżeli chcesz je teraz zdefiniować, bądź teraz przerwać publikację, ale zachować te daty, dokonaj edycji i ustaw właściwą opcję.<br /><br />Czy chcesz kontynuować?';
$_lang['resource_unpublishdate'] = 'Zakończenie publikacji';
$_lang['resource_unpublishdate_help'] = 'Data, po upływie której publikacja zasobu <strong>zostanie zakończona</strong>. Pozostaw puste, aby nie włączać tej opcji.';
$_lang['resource_unpublished'] = 'Nieopublikowany';
$_lang['resource_untitled'] = 'Untitled Resource';
$_lang['resource_uri'] = 'Alias';
$_lang['resource_uri_help'] = 'Pełny relatywny adres URL dla tego zasobu z uwzględnieniem suffiksu.';
$_lang['resource_uri_override'] = 'Niezależny alias';
$_lang['resource_uri_override_help'] = 'Jeżeli zaznaczone, alias do tego zasobu zostanie na sztywno zapisany z poniższą wartością.';
$_lang['resource_with_id_not_found'] = 'Nie znaleziono dokumentu o id: %s!';
$_lang['resource_view'] = 'Wyświetl';
$_lang['show_sort_options'] = 'Pokaż opcje sortowania';
$_lang['site_schedule'] = 'Kalendarz publikacji';
$_lang['site_schedule_desc'] = 'Ta lista zawiera zasoby z zaplanowanymi datami rozpoczęcia i zakończenia publikacji. Możesz przełączyć wyświetlanie listy, używając przycisku.';
$_lang['source'] = 'Źródło';
$_lang['static_resource'] = 'Załącznik';
$_lang['static_resource_create_here'] = 'Załącznik';
$_lang['static_resource_new'] = 'Utwórz nowy Załącznik';
$_lang['status'] = 'Status';
$_lang['symlink'] = 'Dowiązanie';
$_lang['symlink_create'] = 'Create Symlink';
$_lang['symlink_create_here'] = 'Dowiązanie';
$_lang['symlink_help'] = 'Adres obiektu, do którego wskazuje to dowiązanie. Jeżeli ma to być istniejący zasób serwisu, wprowadź tutaj jego nr ID.';
$_lang['symlink_message'] = 'Dowiązanie to odwołanie do innego zasobu w serwisie, do którego następuje przekierowanie bez zmiany adresu URL.';
$_lang['symlink_new'] = 'Utwórz nowe Dowiązanie';
$_lang['template_variables'] = 'Zmienne Szablonu (TV)';
$_lang['untitled_resource'] = 'Untitled Resource';
$_lang['weblink'] = 'Odnośnik';
$_lang['weblink_create'] = 'Create Weblink';
$_lang['weblink_create_here'] = 'Odnośnik';
$_lang['weblink_help'] = 'Adres URL obiektu, do którego wskazuje ten odnośnik. Jeżeli ma to być istniejący zasób serwisu, wprowadź tutaj jego nr ID.';
$_lang['weblink_message'] = 'A weblink is a reference to an object on the internet. This could be a document within MODX, a page on another site or an image or other file on the internet.';
$_lang['weblink_new'] = 'Utwórz nowy Odnośnik';
$_lang['weblink_response_code'] = 'Kod odpowiedzi HTTP';
$_lang['weblink_response_code_help'] = 'Kod odpowiedzi HTTP, który ma być wysyłany dla tego odnośnika.';
